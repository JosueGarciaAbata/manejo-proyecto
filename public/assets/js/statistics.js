document.addEventListener('DOMContentLoaded', function() {
    fetch("/api/vote-statistics")
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                const totalVotes = data.data.reduce((acc, item) => acc + item.total_votes, 0);
                const partyNames = data.data.map(item => item.party_name);
                const votePercentages = data.data.map(item => item.total_votes);

                const ctx = document.getElementById('voteChart').getContext('2d');
                const voteChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: partyNames,
                        datasets: [{
                            data: votePercentages,
                            backgroundColor: [
                                '#FF5733', '#FF8D33', '#FFBD33', '#FFF333', '#BFFF33'
                            ],
                            borderColor: '#fff',
                            borderWidth: 1
                        }]
                    },
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
                                    label: function(tooltipItem) {
                                        const index = tooltipItem.dataIndex;
                                        const percentage = ((votePercentages[index] / totalVotes) * 100).toFixed(2);
                                        const candidates = data.data[index].candidates
                                            .map(candidate => candidate.name)
                                            .join(', ');
                                        return `${partyNames[index]}: ${votePercentages[index]} votes (${percentage}%)\nCandidates: ${candidates}`;
                                    }
                                }
                            },
                            datalabels: {
                                color: '#000',
                                formatter: (value, context) => {
                                    const percentage = ((value / totalVotes) * 100).toFixed(2);
                                    return `${percentage}%`; // Muestra el porcentaje en cada segmento
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
            } else {
                console.error('Failed to fetch data:', data.message);
            }
        })
        .catch(error => console.error('Error fetching data:', error));
});
