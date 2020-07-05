<template>
    <div class="">
        <!--        <div class="container w-50 h-50">-->
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">瞑想チャート</h4>
        </div>
        <MeditationChart></MeditationChart>
        <!--        </div>-->
    </div>
</template>

<script>


    import MeditationChart from "./MeditationChart";

    export default {
        data() {
            return {
                users: []
            }
        },
        components: {
            MeditationChart,
        },
    }

</script>
