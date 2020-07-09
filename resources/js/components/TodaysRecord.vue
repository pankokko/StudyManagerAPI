<template>
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th scope="col">日付</th>
                <th scope="col">瞑想時間</th>
            </tr>
            </thead>
            <tbody>
            <tr  v-for="(record, index) in records">
                <td>{{record.date}}</td>
                <td>{{record.meditation_time}}分</td>
            </tr>

            </tbody>
        </table>
        <div class="container m-auto d-flex justify-content-center">
            <StopWatch @append="appendData"></StopWatch>
        </div>
    </div>
</template>
<script>

    import StopWatch from "./StopWatch";

    export default {
        props: {
            meditations: {
                type: String
            }
        },
        data() {
            return {
                records : [],
            }
        },
        components: {
            StopWatch
        },
        methods: {
            getMeditations() {
                this.records = JSON.parse(this.meditations);
                // console.log(this.records);
            },
            appendData(Value){
                // console.log('親コンポーネントで受け取りました');
                var Value = JSON.parse(Value);
                this.records.push(Value);
                console.log(this.records);
            }
        },
        created(){
            this.getMeditations()
        },
    }

</script>
