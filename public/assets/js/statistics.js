const modal = document.getElementById("container-add-vote");
const closeBtn = document.querySelector(".cerrar");
const formModal = document.getElementById("form-add-vote");
const candidates = document.querySelectorAll(".candidate-item");
let currentEmail = "";
let globalData = null;
let chartInstance;

const getData = async () => {
    try {
        const response = await fetch("/api/vote-statistics");
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        globalData = await response.json();
        return globalData;
    } catch (error) {
        console.error('Error fetching data:', error);
        return null;
    }
};



const setChartjs = data => {
    if (data.status !== 'success') {
        console.error('Failed to fetch data:', data.message);
        return;
    }

    const totalVotes = data.parties.reduce((acc, item) => acc + item.total_votes, 0);
    const partyNames = data.parties.map(item => item.candidates.find(candidate=>candidate.position==='Rector') );
    const votePercentages = data.parties.map(item => item.total_votes);

    const datos = {
        labels: partyNames,
        datasets: [{
            label: 'Votos',
            data: votePercentages,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
            ],
            hoverBackgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
            ],
            hoverOffset: 6,
            borderColor: '#fff',
            borderWidth: 1
        }]
    };

    const ctx = document.getElementById('votes-statistics').getContext('2d');
    if (!chartInstance) {
        chartInstance = new Chart(ctx, {
            type: 'doughnut',
            data: datos,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'black',
                            font: { size: 14 }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const index = tooltipItem.dataIndex;
                                const percentage = ((votePercentages[index] / totalVotes) * 100).toFixed(2);
                                const candidates = data.parties[index].candidates
                                    .map(candidate => candidate.name)
                                    .join(', ');
                                return `${partyNames[index]}: ${votePercentages[index]} votos (${percentage}%)\nCandidatos: ${candidates}`;
                            }
                        }
                    },
                    datalabels: {
                        color: '#000',
                        formatter: (value, context) => {
                            const percentage = ((value / totalVotes) * 100).toFixed(2);
                            return `${percentage}%`;
                        },
                        font: { weight: 'bold', size: 12 },
                        anchor: 'center',
                        align: 'center',
                        offset: -10
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    } else {
        updateChartData(votePercentages, partyNames);
    }
};

const updateChartData = (votePercentages, partyNames) => {
    chartInstance.data.datasets[0].data = votePercentages;
    chartInstance.data.labels = partyNames;
    chartInstance.update();
    console.log(globalData);
};

const registerVote = partyId => {
    const partyIndex = globalData.parties.findIndex(party => party.id === partyId);
    if (partyIndex !== -1) {
        globalData.parties[partyIndex].total_votes += 1;
        setChartjs(globalData);
    } else {
        console.error('Party not found in globalData');
    }
};


const voteHandler = (event, listId) => {
    modal.style.display = "block";
    document.getElementById("id_lis").value = listId;
}

const createContainers = (data) => {
    if (data.status === 'success') {
        const partyList = document.getElementById('party-list');

        data.parties.forEach(party => {
            // Columna de Bootstrap
            const container = document.createElement('div');
            container.classList.add('col-sm-6', 'mb-4');

            // Tarjeta de Bootstrap
            const card = document.createElement('div');
            card.classList.add('card', 'position-relative', 'overflow-hidden');

            // Imagen con clase personalizada para el CSS de animación
            const img = document.createElement('img');
            img.src = party.image || '/images/default.jpg';
            img.alt = party.description;
            img.classList.add('card-img-top', 'custom-card-img');

            // Contenido del cuerpo de la tarjeta
            const cardBody = document.createElement('div');
            cardBody.classList.add('card-body', 'text-center', 'custom-overlay');
            cardBody.id = party.id;

            const title = document.createElement('h3');
            title.classList.add('card-title');
            title.textContent = party.party_name;

            const paragraph = document.createElement('p');
            paragraph.classList.add('card-text');
            paragraph.textContent = party.description;

            // Construcción de la estructura
            cardBody.appendChild(title);
            cardBody.appendChild(paragraph);
            card.appendChild(img);
            card.appendChild(cardBody);
            container.appendChild(card);
            partyList.appendChild(container);

            cardBody.addEventListener('click', event => {
                voteHandler(event, party.id);
            });
        });
    }
};


const closeModal = modalContainer => {
    if (modalContainer) modalContainer.style.display = "none";
};

closeBtn.addEventListener("click", (e) => {
    const modalContainer = closeBtn.closest(".modal");
    closeModal(modalContainer);
});



window.addEventListener("click", (event) => {
    if (event.target.classList.contains("modal")) {
        const modals = document.querySelectorAll(".modal");
        modals.forEach(modal => closeModal(modal));
    }
});


document.addEventListener('DOMContentLoaded', () => {
    getData().then(data => {
        if (data) {
            createContainers(data);
            setChartjs(data);
        }
    });
});

const reportSuccess = (message, isSuccess = true) => {
    const successMessageDiv = document.getElementById('successMessage');
    successMessageDiv.innerText = message; 

    if (isSuccess) {
        successMessageDiv.className = 'success-message success';
    } else {
        successMessageDiv.className = 'success-message error';
    }

    successMessageDiv.style.display = 'block'; 
    successMessageDiv.style.opacity = 1;

    setTimeout(() => {
        successMessageDiv.style.opacity = 0;
        // Hacer que la tarjeta se vuelva transparente
        // Ocultar la tarjeta después de la transición
        setTimeout(() => {
            successMessageDiv.style.display = 'none'; // Ocultar el div
        }, 500); // Tiempo de espera para ocultar después de la animación
    }, 3000);
};

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('voterForm').addEventListener('submit', async function (event) {
        event.preventDefault();
        const idList=document.getElementById('id_lis');
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
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            if (!response.ok) {
                reportSuccess('Error al registrar: ' + error.message, false);
            }
            // para luego revisar si es un usuario nuevo
            const data = await response.json(); 
            console.log(data);
            // if (data.is_new_voter) {
            //     // Redirigir a otra ventana si es un nuevo votante
            //     window.location.href = `/voters/complete-register?email=${encodeURIComponent(emailValue)}`;
            // }

            //cerrar modal
            modal.style.display = "none";

            reportSuccess('Registro completado exitosamente.');
            
            registerVote(parseInt(idList.value));
            document.getElementById('id_lis').value = '';
            emailInput.value = '';

            const updatedData = await getData();
            if (updatedData) {
                setChartjs(updatedData);
            }

        } catch (error) {
            console.error('Error:', error);
            alert('Error al registrar: ' + error.message);
        }
    });
});
