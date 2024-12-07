// Selectores y variables
const modal = document.getElementById("container-add-vote");
const closeBtn = document.querySelector(".cerrar");
const formModal = document.getElementById("form-add-vote");
const candidates = document.querySelectorAll(".candidate-item");
let currentEmail = "";
let chartInstance;

// Función para obtener los datos de votación
const getData = async () => {
    try {
        const response = await fetch("/api/vote-statistics");
        if (!response.ok) throw new Error("Network response was not ok");
        return await response.json();
    } catch (error) {
        console.error("Error fetching data:", error);
        return null;
    }
};

// Función para crear un gráfico con Chart.js
const setChartjs = (data) => {
    if (data.status !== "success") {
        console.error("Failed to fetch data:", data.message);
        return;
    }

    const totalVotes = data.parties.reduce(
        (acc, item) => acc + item.total_votes,
        0
    );

    const partyNames = getPartyNames(data);
    const voteCounts = data.parties.map(item => item.total_votes);

    const chartData = {
        labels: partyNames,
        datasets: [{
            label: "Votos",
            data: voteCounts,
            backgroundColor: generateBackgroundColors(),
            hoverBackgroundColor: generateHoverBackgroundColors(),
            borderColor: "#fff",
            borderWidth: 1,
            hoverOffset: 6,
        }],
    };

    const ctx = document.getElementById("votes-statistics").getContext("2d");

    // Destruir la instancia de la gráfica si ya existe
    if (chartInstance) chartInstance.destroy();

    // Crear una nueva instancia de la gráfica
    chartInstance = new Chart(ctx, {
        type: "doughnut",
        data: chartData,
        options: getChartOptions(totalVotes),
        plugins: [ChartDataLabels],
    });
};

// Obtener nombres de los partidos (candidatos para rector)
const getPartyNames = (data) => {
    return data.parties
        .map((item) => {
            const candidate = item.candidates.find(
                (candidate) => candidate.position === "Rector"
            );
            return candidate ? candidate.name : null;
        })
        .filter((name) => name !== null);
};

// Generar colores para los gráficos
const generateBackgroundColors = () => [
    "rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 206, 86)",
    "rgb(75, 192, 192)", "rgb(153, 102, 255)"
];

const generateHoverBackgroundColors = () => [
    "rgba(255, 99, 132, 0.8)", "rgba(54, 162, 235, 0.8)", 
    "rgba(255, 206, 86, 0.8)", "rgba(75, 192, 192, 0.8)", 
    "rgba(153, 102, 255, 0.8)"
];

// Configuración del gráfico
const getChartOptions = (totalVotes) => ({
    responsive: true,
    plugins: {
        legend: {
            position: "top",
            labels: { color: "black", font: { size: 14 } },
        },
        tooltip: {
            callbacks: {
                label: function (tooltipItem) {
                    const index = tooltipItem.dataIndex;
                    const voteCount = tooltipItem.dataset.data[index];
                    const votePercent = ((voteCount / totalVotes) * 100).toFixed(2);
                    const partyName = tooltipItem.chart.data.labels[index];
                    return `${partyName}: ${voteCount} votos (${votePercent}%)`;
                },
            },
        },
        datalabels: {
            color: "#000",
            formatter: (value) => `${((value / totalVotes) * 100).toFixed(2)}%`,
            font: { weight: "bold", size: 12 },
            anchor: "center",
            align: "center",
            offset: -10,
        },
    },
});

// Función para manejar el clic en un candidato
const voteHandler = (event, listId) => {
    modal.style.display = "block";
    document.getElementById("id_lis").value = listId;
};

// Crear contenedores de partidos
const createContainers = (data) => {
    if (data.status === "success") {
        const partyList = document.getElementById("party-list");

        data.parties.forEach((party) => {
            const container = createPartyContainer(party);
            partyList.appendChild(container);
        });
    }
};

// Crear un contenedor individual para un partido
const createPartyContainer = (party) => {
    const container = document.createElement("div");
    container.classList.add("col-sm-6", "mb-4");

    const card = createPartyCard(party);
    container.appendChild(card);

    return container;
};

// Crear una tarjeta para un partido
const createPartyCard = (party) => {
    const card = document.createElement("div");
    card.classList.add("card", "position-relative", "overflow-hidden");

    const img = document.createElement("img");
    img.src = party.image || "/images/default.jpg";
    img.alt = party.description;
    img.classList.add("card-img-top", "custom-card-img");

    const cardBody = createCardBody(party);

    card.appendChild(img);
    card.appendChild(cardBody);
    return card;
};

// Crear el cuerpo de la tarjeta
const createCardBody = (party) => {
    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body", "text-center", "custom-overlay");
    cardBody.id = party.id;

    const voteMessage = document.createElement("h2");
    voteMessage.textContent = "Votar";
    cardBody.appendChild(voteMessage);

    cardBody.addEventListener("click", () => voteHandler(event, party.id));
    return cardBody;
};

// Cerrar el modal
const closeModal = (modalContainer) => {
    if (modalContainer) modalContainer.style.display = "none";
};

// Cerrar el modal cuando se hace clic en el botón o fuera de él
closeBtn.addEventListener("click", () => closeModal(closeBtn.closest(".modal")));
window.addEventListener("click", (event) => {
    if (event.target.classList.contains("modal")) {
        document.querySelectorAll(".modal").forEach(closeModal);
    }
});

// Mostrar mensaje de éxito o error
const reportSuccess = (message, isSuccess = true) => {
    const successMessageDiv = document.getElementById("successMessage");
    successMessageDiv.innerText = message;
    successMessageDiv.className = `success-message ${isSuccess ? 'success' : 'error'}`;
    successMessageDiv.style.display = "block";
    successMessageDiv.style.opacity = 1;

    setTimeout(() => {
        successMessageDiv.style.opacity = 0;
        setTimeout(() => successMessageDiv.style.display = "none", 500);
    }, 3000);
};

// Manejo de envío de formulario
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("voterForm").addEventListener("submit", async (event) => {
        event.preventDefault();

        const emailInput = document.querySelector('input[name="ema_vot"]');
        const emailValue = emailInput.value.trim();
        if (!emailValue) return;

        const formData = new FormData(event.target);
        try {
            const response = await fetch(event.target.action, {
                method: "POST",
                body: formData,
                headers: { "X-Requested-With": "XMLHttpRequest" },
            });

            if (!response.ok) {
                reportSuccess("Error al registrar", false);
                return;
            }

            const data = await response.json();
            modal.style.display = "none";
            reportSuccess("Registro completado exitosamente.");
            emailInput.value = "";

            const updatedData = await getData();
            if (updatedData) setChartjs(updatedData);
        } catch (error) {
            console.error("Error:", error);
            alert("Error al registrar: " + error.message);
        }
    });
});

// Cargar los datos cuando el DOM está listo
document.addEventListener("DOMContentLoaded", () => {
    getData().then((data) => {
        if (data) {
            createContainers(data);
            setChartjs(data);
        }
    });
});
