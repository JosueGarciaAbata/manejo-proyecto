const getData = async () => {
    try {
        const response = await fetch("/api/vote-statistics");
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
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

    const totalVotes = data.data.reduce((acc, item) => acc + item.total_votes, 0);
    const partyNames = data.data.map(item => item.party_name);
    const votePercentages = data.data.map(item => item.total_votes);

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
            hoverOffset: 4,
            borderColor: '#fff',
            borderWidth: 1
        }]
    };
    const ctx = document.getElementById('votes-statistics').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: datos,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'black',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            const index = tooltipItem.dataIndex;
                            const percentage = ((votePercentages[index] / totalVotes) * 100).toFixed(2);
                            const candidates = data.data[index].candidates
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
                    font: {
                        weight: 'bold',
                        size: 12,
                    },
                    anchor: 'end',
                    align: 'start',
                    offset: 10
                }
            }
        },
        plugins: [ChartDataLabels]
    });
};


const createContainers = data => {
    if (data.status === 'success') {
        const partyList = document.getElementById('party-list');

        data.data.forEach(party => {
            const partyElement = document.createElement('div');
            partyElement.classList.add('col-sm-6');

            const cdPic = document.createElement('div');
            cdPic.classList.add('cd-pic');
            cdPic.id = party.id;

            const img = document.createElement('img');
            img.src = party.image || '/images/default.jpg';
            img.alt = party.description;

            const overlay = document.createElement('div');
            overlay.classList.add('overlay');
            overlay.textContent = 'Votar';

            cdPic.appendChild(img);
            cdPic.appendChild(overlay);

            const partyItem = document.createElement('div');
            partyItem.classList.add('party-item');

            const campaingSingle = document.createElement('div');
            campaingSingle.classList.add('campaing-one__single');

            const partyId = document.createElement('div');
            partyId.classList.add('party-id');
            partyId.id = party.id;

            const cdTitle = document.createElement('div');
            cdTitle.classList.add('cd-title');

            const title = document.createElement('h3');
            title.classList.add('campaing-one__title');
            title.textContent = party.party_name;

            const description = document.createElement('p');
            description.textContent = party.description;

            cdTitle.appendChild(title);
            partyId.appendChild(cdTitle);
            partyId.appendChild(description);
            campaingSingle.appendChild(partyId);
            partyItem.appendChild(campaingSingle);
            
            partyElement.appendChild(cdPic);
            partyElement.appendChild(partyItem);
            partyList.appendChild(partyElement);
        });
    }
};


document.addEventListener('DOMContentLoaded', () => {
    getData().then(data => {
        if (data) {
            setChartjs(data);
            createContainers(data);
        }
    });
});