<script>
    import {Bar} from 'vue-chartjs';

    export default {
        type: 'horizontalBar',
        extends: Bar,
        name: 'chart',
        props: {
            studyRecords: {
                type: String,
            }
        },
        data() {
            return {
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: '勉強時間: Hour',
                            data: [],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                        },
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: '過去一週間'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 10,
                            }
                        }]
                    }
                }
            }
        },
        mounted() {
            var Studies = JSON.parse(this.studyRecords);
            this.data.labels.push(...(Object.keys(Studies.weekData)));
            var array = [];
            Object.values(Studies.weekData).forEach(function (value) {
                array.push(value);
            });
            this.data.datasets[0].data.push(...(array));
            this.renderChart(this.data, this.options)
        }
    }
</script>
