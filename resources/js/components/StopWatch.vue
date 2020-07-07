<template>
        <div class="card text-center  pb-3 pr-3 pl-3 mb-3">
            <div class="card-header">瞑想タイマー</div>
            <p class="text-center h3 font-weight-bold">
                {{checkHours | zeroPadding}}：{{checkMinutes | zeroPadding}}：{{checkSeconds |
                zeroPadding}}：{{checkMiliSeconds |
                showMiliseconds}}
            </p>
            <div>
                <button class="btn btn-info" @click="start">スタート</button>
                <button class="btn btn-danger" @click="stop">ストップ</button>
                <button class="btn btn-warning" @click="reset">リセット</button>
                <button class="btn btn-success" @click="sendData" type="submit">保存</button>
            </div>
            <p class="text-danger h3">{{validationMessages.nullValue}}</p>
        </div>
</template>

<script>
    export default {
        data: function () {
            return {
                animationId: 0,
                hours: 0,
                minutes: 0,
                second: 0,
                milisecond: 0,
                startTime: 0,// スタート時間
                endTime: 0,// ストップ押した時間
                diffTime: 0, //スタートとストップ押した時の差分
                flag: false,
                meditation_time: 0,
                validationMessages: {
                    nullValue: "",
                    },
            }
        },
        filters: {
            zeroPadding(value) {
                return value.toString().padStart(2, 0);
            },
            showMiliseconds(value) {
                return value.toString().padStart(3, 0);
            }
        },
        methods: {
            setStartTime(time) {
                //performance.now()自体は前回のページから今回のページへと、遷移を開始した瞬間からの経過時間を算出する
                this.startTime = performance.now() - time;
            },
            start() {
                if (this.flag) {
                    return false;
                }
                const vm_data = this;
                this.flag = true; // スタートしたらタイマーflagをtrueに
                this.setStartTime(vm_data.diffTime);
                (function progress() {
                    vm_data.endTime = performance.now();
                    vm_data.diffTime = vm_data.endTime - vm_data.startTime;
                    [vm_data.second, vm_data.milisecond] = [Math.floor(vm_data.diffTime / 1000), Math.floor(vm_data.diffTime % 1000)];
                    vm_data.animationId = window.requestAnimationFrame(progress);
                }());
            },
            stop() {
                this.flag = false;   // ストップしたらタイマーflagをfalseに
                window.cancelAnimationFrame(this.animationId);
            },
            reset() {
                if (this.flag) {
                    return false;
                }
                this.startTime = this.diffTime = 0;
            },
            sendData() {

                if (this.checkMinutes === 0) {
                    return this.validationMessages.nullValue = "瞑想時間が0分です"
                }

                var time = {
                    'meditation_time': this.checkMinutes,
                }
                axios.post('/user/meditation/save_record ', time).then(res => {
                    console.log(res.data);
                    if (res.data) {
                        this.appendData(res.data);
                    }
                });
            },
            appendData(Value) {
                console.log(this.checkMinutes);
                this.$emit('append', Value);
            }
        },
        computed: {
            checkHours() {
                return Math.floor(this.diffTime / 1000 / 60 / 60);
            },
            checkMinutes() {
                return Math.floor(this.diffTime / 1000 / 60) % 60;
            },
            checkSeconds() {
                return Math.floor(this.diffTime / 1000) % 60;
            },
            checkMiliSeconds() {
                return Math.floor(this.diffTime % 1000);
            },
        }
    }
</script>
