const modal = document.getElementById("container-add-vote");
const closeBtn = document.querySelector(".cerrar");
const formModal = document.getElementById("form-add-vote");
const candidates = document.querySelectorAll(".candidate-item");
let currentEmail = "";
let chartInstance;

const getData = async () => {
    try {
        const response = await fetch("/api/vote-statistics");
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return await response.json();
    } catch (error) {
        console.error("Error fetching data:", error);
        return null;
    }
};

const setChartjs = (data) => {
    if (data.status !== "success") {
        console.error("Failed to fetch data:", data.message);
        return;
    }

    const totalVotes = data.parties.reduce(
        (acc, item) => acc + item.total_votes,
        0
    );
    const partyNames = data.parties
        .map((item) => {
            const candidate = item.candidates.find(
                (candidate) => candidate.position === "Rector"
            );
            return candidate ? candidate.name : null;
        })
        .filter((name) => name !== null);
    const voteCounts = data.parties.map((item) => item.total_votes);

    const datos = {
        labels: partyNames,
        datasets: [
            {
                label: "Votos",
                data: voteCounts, // Usamos votos absolutos
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 206, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(153, 102, 255)",
                ],
                hoverBackgroundColor: [
                    "rgba(255, 99, 132, 0.8)",
                    "rgba(54, 162, 235, 0.8)",
                    "rgba(255, 206, 86, 0.8)",
                    "rgba(75, 192, 192, 0.8)",
                    "rgba(153, 102, 255, 0.8)",
                ],
                hoverOffset: 6,
                borderColor: "#fff",
                borderWidth: 1,
            },
        ],
    };

    const ctx = document.getElementById("votes-statistics").getContext("2d");

    // Destruir la instancia de la gráfica si ya existe
    if (chartInstance) {
        chartInstance.destroy();
    }

    // Crear una nueva instancia de la gráfica
    chartInstance = new Chart(ctx, {
        type: "doughnut",
        data: datos,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                    labels: {
                        color: "black",
                        font: { size: 14 },
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            const index = tooltipItem.dataIndex;
                            const voteCount = tooltipItem.dataset.data[index];
                            const votePercent = (
                                (voteCount / totalVotes) *
                                100
                            ).toFixed(2);
                            const partyName =
                                tooltipItem.chart.data.labels[index];
                            return `${partyName}: ${voteCount} votos (${votePercent}%)`;
                        },
                    },
                },
                datalabels: {
                    color: "#000",
                    formatter: (value, context) => {
                        const percentage = ((value / totalVotes) * 100).toFixed(
                            2
                        );
                        return `${percentage}%`;
                    },
                    font: { weight: "bold", size: 12 },
                    anchor: "center",
                    align: "center",
                    offset: -10,
                },
            },
        },
        plugins: [ChartDataLabels],
    });
};

const voteHandler = (event, listId) => {
    modal.style.display = "block";
    document.getElementById("id_lis").value = listId;
};

const createContainers = (data) => {
    if (data.status === "success") {
        const partyList = document.getElementById("party-list");

        data.parties.forEach((party) => {
            // Columna de Bootstrap
            const container = document.createElement("div");
            container.classList.add("col-sm-6", "mb-4");

            // Tarjeta de Bootstrap
            const card = document.createElement("div");
            card.classList.add("card", "position-relative", "overflow-hidden");

            // Imagen con clase personalizada para el CSS de animación
            const img = document.createElement("img");
            img.src = party.image || "/images/default.jpg";
            img.alt = party.description;
            img.classList.add("card-img-top", "custom-card-img");

            // Contenido del cuerpo de la tarjeta
            const cardBody = document.createElement("div");
            cardBody.classList.add(
                "card-body",
                "text-center",
                "custom-overlay"
            );
            cardBody.id = party.id;
            /*
            const title = document.createElement('h3');
            title.classList.add('card-title');
            title.textContent = party.party_name;

            const paragraph = document.createElement("p");
            paragraph.classList.add("card-text");
            paragraph.textContent = party.description;
            
            cardBody.appendChild(title);
            cardBody.appendChild(paragraph);
            */

            // Construcción de la estructura
            const voteMessage = document.createElement("h2");
            voteMessage.textContent = "Votar";
            cardBody.appendChild(voteMessage);
            card.appendChild(img);
            card.appendChild(cardBody);
            container.appendChild(card);
            partyList.appendChild(container);

            cardBody.addEventListener("click", (event) => {
                voteHandler(event, party.id);
            });
        });
    }
};

const closeModal = (modalContainer) => {
    if (modalContainer) modalContainer.style.display = "none";
};

closeBtn.addEventListener("click", (e) => {
    const modalContainer = closeBtn.closest(".modal");
    closeModal(modalContainer);
});

window.addEventListener("click", (event) => {
    if (event.target.classList.contains("modal")) {
        const modals = document.querySelectorAll(".modal");
        modals.forEach((modal) => closeModal(modal));
    }
});

document.addEventListener("DOMContentLoaded", () => {
    getData().then((data) => {
        if (data) {
            createContainers(data);
            setChartjs(data);
        }
    });
});

const reportSuccess = (message, isSuccess = true) => {
    const successMessageDiv = document.getElementById("successMessage");
    successMessageDiv.innerText = message;

    if (isSuccess) {
        successMessageDiv.className = "success-message success";
    } else {
        successMessageDiv.className = "success-message error";
    }

    successMessageDiv.style.display = "block";
    successMessageDiv.style.opacity = 1;

    setTimeout(() => {
        successMessageDiv.style.opacity = 0;
        // Hacer que la tarjeta se vuelva transparente
        // Ocultar la tarjeta después de la transición
        setTimeout(() => {
            successMessageDiv.style.display = "none"; // Ocultar el div
        }, 500); // Tiempo de espera para ocultar después de la animación
    }, 3000);
};

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("voterForm")
        .addEventListener("submit", async function (event) {
            event.preventDefault();
            const idList = document.getElementById("id_lis");
            const emailInput = document.querySelector('input[name="ema_vot"]');
            const emailValue = emailInput.value.trim();
            currentEmail = emailInput;

            if (!emailValue) {
                return;
            }

            const formData = new FormData(this);
            console.log(formData);
            try {
                const response = await fetch(this.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                });

                if (!response.ok) {
                    reportSuccess(
                        "Error al registrar: " + error.message,
                        false
                    );
                }

                const data = await response.json();

                modal.style.display = "none";

                reportSuccess("Registro completado exitosamente.");
                document.getElementById("id_lis").value = "";
                emailInput.value = "";

                const updatedData = await getData();
                if (updatedData) setChartjs(updatedData);
            } catch (error) {
                console.log("Something went wrong")
                console.error("Error:", error);
                alert("Error al registrar: " + error.message);
            }
        });
});
