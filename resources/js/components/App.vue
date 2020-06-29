<template>
    <div class="container">
        <StopWatch></StopWatch>
    </div>
</template>

<script>

    import StopWatch  from "./StopWatch.vue";

    export default {
        components: {
            StopWatch,
        },
        data: function() {
            return  {
                messsage: "hello world",
            }
        },
    }

</script>
