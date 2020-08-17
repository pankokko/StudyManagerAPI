<template>
    <div class="card mb-4 box-shadow mypage-study-card">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">今週の目標時間</h4>
            <h5 class="my-0 font-weight-normal">目標 {{weekly.targetHour}}時間</h5>
            <h5 class="my-0 font-weight-normal">現在 {{weekTotalTime.weekTotalSoFar}}時間</h5>
            <p class="my-0 font-weight-normal">先週との差分　</p>
        </div>
        <div class="card-body">
            <target-time-chart :height=200></target-time-chart>
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
                },
                weekTotalTime: {
                    weekTotalSoFar: '',
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
                  this.weekTotalTime.weekTotalSoFar = this.parseWeekTotal;
        },
    }
</script>
