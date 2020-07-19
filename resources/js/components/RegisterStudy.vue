<template>
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">勉強時間登録
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog custom-modal w-100" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">勉強タイトル</label>
                                <input type="text" name="study_title" v-model="studyTitle" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">勉強内容</label>
                                <textarea class="form-control" name="study_content" v-model="studyContent" id="message-text"></textarea>
                            </div>

                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="started_date-year" class="">日付:</label>
                                    <div class="">
                                        <input type="text" id="started_date-year" v-model="year"
                                               class="form-control w-50">
                                        年
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="started_date-month" class=""></label>
                                    <div class="">
                                        <input type="text" id="started_date-month" v-model="month"
                                               class="form-control w-50">
                                        月
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="started_date-day" class=""></label>
                                    <div class="">
                                        <input type="text" id="started_date-day" v-model="day"
                                               class="form-control w-50">
                                        日
                                    </div>
                                </div>
                            </div>

                            <!--                            <div class="form-inline">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="end_date-year" class="">終了日:</label>-->
                            <!--                                    <div class="">-->
                            <!--                                        <input type="text" id="end_date-year" :value="year" class="form-control w-50">-->
                            <!--                                        年-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="end_date-month" class=""></label>-->
                            <!--                                    <div class="">-->
                            <!--                                        <input type="text" id="end_date-month" :value="month" class="form-control w-50">-->
                            <!--                                        月-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="end_date-day" class=""></label>-->
                            <!--                                    <div class="">-->
                            <!--                                        <input type="text" id="end_date-day" :value="day" class="form-control w-50">-->
                            <!--                                        日-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="started_time-hour" class="">開始時刻:</label>
                                    <div class="">
                                        <input type="text" id="started_time-hour" name="started-hour"
                                               v-model="startedHour" class="form-control w-50">
                                        時
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="started_time-min" class=""></label>
                                    <div class="">
                                        <input type="text" id="started_time-min" name="started-min" v-model="startedMin"
                                               class="form-control w-50">
                                        分
                                    </div>
                                </div>
                            </div>

                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="end_time-hour" class="">終了時刻:</label>
                                    <div class="">
                                        <input type="text" id="end_time-hour" name="end-hour" v-model="endHour"
                                               class="form-control w-50">
                                        時
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="end_time-min" class=""></label>
                                    <div class="">
                                        <input type="text" id="end_time-min" name="end-min" v-model="endMin"
                                               class="form-control w-50">
                                        分
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="createRecord" class="btn btn-primary" data-dismiss="modal">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>


    export default {

        data() {
            return {
                studyTitle: '',
                studyContent: '',
                year: "",
                month: "",
                day: "",
                startedHour: "",
                startedMin: "",
                endHour: "",
                endMin: "",
            }
        },
        created: function () {
            var date = new Date();
            this.year = date.getFullYear();
            this.month = date.getMonth() + 1;
            this.day = date.getDate();
        },
        methods: {
            createRecord() {
                var record = {
                    studyTitle: this.studyTitle,
                    studyContent: this.studyContent,
                    year: this.year,
                    month: this.month,
                    day: this.day,
                    startedHour: this.startedHour,
                    startedMin: this.startedMin,
                    endHour: this.endHour,
                    endMin: this.endMin,
                }
                axios.post("/user/study/create_record", record).then(res => {

                    if (res.data) {
                        this.addStudyRecord(res.data)
                    }
                })
            },
            addStudyRecord(value) {
                this.$emit('appendStudy', value);
            }
        }
    }

</script>



















