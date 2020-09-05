<script src="../app.js"></script>
<template>
    <div class="card mb-2 box-shadow mypage-study-card">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">今週の目標時間</h4>
            <h5 class="my-0 font-weight-normal">目標 {{weekly.targetHour}}時間{{weekly.targetMinutes}}分</h5>
            <h5 class="my-0 font-weight-normal">現在
                {{weekTotalTime.weekTotalHourSoFar}}時間{{weekTotalTime.weekTotalMinutesSoFar}}分</h5>
        </div>
        <div v-if="display" class="card-body text-center">
            <h3 class="card-title pricing-card-title">今週の目標時間を設定する</h3>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo">今週の目標を設定する
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">目標設定</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/user/weekly_target/set_target" method="POST">

                                    <input type="hidden" name="_token" :value="csrf">

                                    <div class="form-group">
                                        <label><i class="far fa-clock"></i>今週の目標時間は？</label>
                                        <vue-timepicker format="H:m" name="study_time" placeholder="時間を入力"
                                                        hour-label="時間" minute-label="分"></vue-timepicker>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="submit" id="submitTarget" class="btn btn-primary">設定する</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <target-time-chart :target-time="weeklyTarget" :actual-time="weekTotal" :height=200></target-time-chart>
        </div>
    </div>
</template>

<script>

    import VueTimepicker from 'vue2-timepicker/src/vue-timepicker.vue';
    import TargetTimeChart from "./TargetTimeChartComponent";

    export default {
        components: {
            TargetTimeChart,
            VueTimepicker,
        },
        props: {
            weeklyTarget: {type: String, required: true},
            weekTotal: {type: String, required: true},
            csrf: {type: String, required: true},
        },
        data() {
            return {
                weekly: {
                    targetHour: '',
                    targetMinutes: '',
                },
                weekTotalTime: {
                    weekTotalHourSoFar: '',
                    weekTotalMinutesSoFar: '',
                },
                display: true
            }
        },
        computed: {
            parseWeeklyTarget() {
                return JSON.parse(this.weeklyTarget);
            },
            parseWeekTotal() {
                return JSON.parse(this.weekTotal);
            },
        },
        methods: {
            isTargetExists(parseWeeklyTarget) {
                if (parseWeeklyTarget[0].id) {
                    return this.display =  false;
                }
            }
        },
        created() {
            this.isTargetExists(this.parseWeeklyTarget);
            this.weekly.targetHour = this.parseWeeklyTarget[0].target_hour;
            this.weekly.targetMinutes = this.parseWeeklyTarget[0].target_minutes;
            this.weekTotalTime.weekTotalHourSoFar = this.parseWeekTotal.study_hour;
            this.weekTotalTime.weekTotalMinutesSoFar = this.parseWeekTotal.study_minutes;
        },
    }
</script>
