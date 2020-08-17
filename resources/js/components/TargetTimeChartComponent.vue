<script>
    import { Doughnut } from 'vue-chartjs'
    export default ({
        extends: Doughnut,
        data() {
            return {
                datas: {
                    // 凡例とツールチップに表示するラベル
                    labels: ['現在の時間', '目標時間'],
                    // 表示するデータ
                    datasets: [
                        {
                            data: [20,40],
                            backgroundColor: ['#f87979', '#aa4c8f'],
                            borderColor: 'transparent',
                        }
                    ]
                },
                options: {
                    responsive: true
                }
            }
        },
        mounted() {
            this.renderChart(this.datas, this.options)
        }
    })
</script>
