<template>
    <div class="container">
        <RegisterStudy @appendStudy="appendStudyRecord" ></RegisterStudy>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col-3"></th>
                <th scope="col-9">
                    <p class="btn btn-primary" v-if=""></p>
                </th>
            </tr>

            </thead>
        </table>
    </div>
</template>

<script>

    import RegisterStudy from "./RegisterStudy";

    export default {
        props: {
            records: {
                type: Array,
            }
        },
        data() {
            return {
                data: {
                    hours: [
                        {id: 1, time: "午前0時"},
                        {id: 2, time: "午前1時"},
                        {id: 3, time: "午前2時"},
                        {id: 4, time: "午前3時"},
                        {id: 5, time: "午前4時"},
                        {id: 6, time: "午前5時"},
                        {id: 7, time: "午前6時"},
                        {id: 8, time: "午前7時"},
                        {id: 9, time: "午前8時"},
                        {id: 10, time: "午前9時"},
                        {id: 11, time: "午前10時"},
                        {id: 12, time: "午前11時"},
                        {id: 13, time: "午後12時"},
                        {id: 14, time: "午後13時"},
                        {id: 15, time: "午後14時"},
                        {id: 16, time: "午後15時"},
                        {id: 17, time: "午後16時"},
                        {id: 18, time: "午後17時"},
                        {id: 19, time: "午後18時"},
                        {id: 20, time: "午後19時"},
                        {id: 21, time: "午後20時"},
                        {id: 22, time: "午後21時"},
                        {id: 23, time: "午後22時"},
                        {id: 24, time: "午後23時"},
                    ],
                }
            }
        },
        components: {
            RegisterStudy,
        },
        methods: {
            //アクシオスgetできるか実験
            appendStudyRecord () {
                axios.get('/user/study/study_axios').then(response => {
                    console.log('セイコウ');
                    console.log(response.data);
                })
            }
        },
        created() {
          console.log(this.records);
        },
    }
</script>
