<script>
    import {Doughnut} from 'vue-chartjs'

    export default ({
        extends: Doughnut,
        props: ['targetTime', 'actualTime'],
        data() {
            return {
                datas: {
                    // 凡例とツールチップに表示するラベル
                    labels: ['今週の合計勉強時間', '今週の目標時間'],
                    // 表示するデータ
                    datasets: [
                        {
                            data: [],
                            backgroundColor: ['#3300FF', '#C0C0C0'],
                            borderColor: 'transparent',
                        }
                    ]
                },
                options: {
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                let total = 0 // 合計格納
                                let indexItem = data.datasets[0].data[tooltipItem.index] // マウスを当てたデータ
                                // 全データの合計算出
                                data.datasets[0].data.forEach(item => {
                                    total += item
                                })
                                // パーセント表示
                                return Math.round(indexItem / total * 100) + ' %'
                            }
                        }
                    },
                    responsive: true
                },
            }
        },
        computed: {
            parseTargetTime() {
                return JSON.parse(this.targetTime);
            },
            parseActualTime() {
                return JSON.parse(this.actualTime);
            },

        },
        methods: {
            convertIntoGraphData(targetTime, actualTime) {
                const CONVERT_TO_MINUTES = 60;
                this.datas.datasets[0].data.push(actualTime.study_minutes + actualTime.study_hour * CONVERT_TO_MINUTES);
                this.datas.datasets[0].data.push(targetTime[0].target_minutes + targetTime[0].target_hour * CONVERT_TO_MINUTES);
            },
            showProgress(totalTime) {
                var total = totalTime[1] + totalTime[0];
                var progress = Math.round(totalTime[0] / total * 100) + '% 完了'
                return progress;
            }
        },
        mounted() {
            this.convertIntoGraphData(this.parseTargetTime, this.parseActualTime);
            var progress = this.showProgress(this.datas.datasets[0].data);

            this.addPlugin({
                afterDraw(chart, go) {
                    //chart内にchartオブジェクトが入っており、chart内のctxオブジェクト内にctx.fontで以下のプロパティにアクセス
                    //font: "40px normal Helvetica "
                    let ctx = chart.ctx
                    let fontSize = 40;
                    let fontStyle = 'normal';
                    let fontFamily = "Helvetica";
                    ctx.fillStyle = '#000';
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                    ctx.textBaseline = 'middle';
                    ctx.fillText(progress, chart.width / 2 - 60, chart.height / 2);
                }
            })

            this.renderChart(this.datas, this.options)
        }
    })
</script>
