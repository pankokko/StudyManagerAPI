<template>
    <div class="container">
        <StopWatch></StopWatch>
        <p v-for="user in users">{{user}}</p>
    </div>
</template>

<script>

    import StopWatch  from "./StopWatch.vue";
    import MeditationChart from "./MeditationChart.vue";

    export default {
        data() {
            return {
                users: []
            }
        },
        components: {
            StopWatch,
            MeditationChart,
        },
        mounted() {
            axios.get('/users_data').then(response => this.users = response.data);
        },

    }

</script>
