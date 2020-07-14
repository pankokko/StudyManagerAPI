<script>
    import { Bar } from 'vue-chartjs';

    export default {
        extends: Bar,
        name: 'chart',
        props: {
            weekTime: {
                type: Array,
            }
        },
        data () {
            return {
                data: {
                    labels: ['1週', '2週', '3週', '4週'],
                    datasets: [
                        {
                            label: 'Line Dataset',
                            data: [10, 20, 30 , 40 ],
                            borderColor: '#CFD8DC',
                            fill: false,
                            type: 'line',
                            lineTension: 0.3,
                        }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 10,
                            }
                        }]
                    },

                }
            }
        },
        mounted () {
            this.data.datasets[0].data.push(this.weekTime);
            console.log('ぽういい');
            console.dir(this.data.datasets[0].data);
            this.renderChart(this.data, this.options)
        }
    }
</script>
