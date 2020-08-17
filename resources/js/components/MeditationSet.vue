<template>
    <div class="">
        <!--        <div class="container w-50 h-50">-->
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">瞑想チャート</h4>
        </div>
        <MeditationChart :week-time="times"></MeditationChart>
        <!--        </div>-->
    </div>
</template>

<script>


    import MeditationChart from "./MeditationChart";

    export default {
        props: {
            timeMonth: {
                type: Array,
            },
        },
        data() {
            return {
                times: [],
            }
        },
        components: {
            MeditationChart,
        },
        created() {
            console.log(this.timeMonth);
        },
    }

</script>
