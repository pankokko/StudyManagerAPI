<template>
    <div class="card mb-4 box-shadow mypage-study-card">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">今週の目標時間</h4>
            <h5 class="my-0 font-weight-normal">目標 {{weekly.targetHour}}時間{{weekly.targetMinutes}}分</h5>
            <h5 class="my-0 font-weight-normal">現在 {{weekTotalTime.weekTotalHourSoFar}}時間{{weekTotalTime.weekTotalMinutesSoFar}}分</h5>
        </div>
        <div class="card-body">
            <target-time-chart :target-time="weeklyTarget"  :actual-time="weekTotal" :height=200></target-time-chart>
        </div>
    </div>
</template>

<script>

    import TargetTimeChart from "./TargetTimeChartComponent";

    export default {
        components: {
            TargetTimeChart,
        },
        props: ['weeklyTarget', 'weekTotal'],
        data() {
            return {
                weekly: {
                    targetHour: '',
                    targetMinutes: '',
                },
                weekTotalTime: {
                    weekTotalHourSoFar: '',
                    weekTotalMinutesSoFar: '',

                }
            }
        },
        computed: {
            parseWeeklyTarget() {
                return JSON.parse(this.weeklyTarget);
            },
            parseWeekTotal() {
                return JSON.parse(this.weekTotal);
            }
        },
        created() {
            this.weekly.targetHour = this.parseWeeklyTarget[0].target_hour;
            this.weekly.targetMinutes = this.parseWeeklyTarget[0].target_minutes;
            this.weekTotalTime.weekTotalHourSoFar = this.parseWeekTotal.study_hour;
            this.weekTotalTime.weekTotalMinutesSoFar = this.parseWeekTotal.study_minutes;
        },
    }
</script>
