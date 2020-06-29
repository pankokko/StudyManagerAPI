<template>
    <div>
        {{checkHours | zeroPadding}}：{{checkMinutes | zeroPadding}}：{{checkSeconds | zeroPadding}}：{{checkMiliSeconds | showMiliseconds}}
        <button @click="start">スタート</button>
        <button @click="stop">ストップ</button>
        <button @click="reset">リセット</button>
    </div>
</template>

<script>
    export default {
        data:function(){
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
            }
        },
        filters:{
            zeroPadding(value){
                return value.toString().padStart(2, 0);
            },
            showMiliseconds(value){
                return value.toString().padStart(3, 0);
            }
        },
        methods:{
            setStartTime(time){
                //performance.now()自体は前回のページから今回のページへと、遷移を開始した瞬間からの経過時間を算出する
                this.startTime = performance.now() - time;
            },
            start(){
                if(this.flag){
                    return false;
                }
                const vm_data = this;
                this.flag = true; // スタートしたらタイマーflagをtrueに
                this.setStartTime(vm_data.diffTime);
                (function progress(){
                    vm_data.endTime = performance.now();
                    vm_data.diffTime = vm_data.endTime - vm_data.startTime;
                    [vm_data.second, vm_data.milisecond] = [Math.floor(vm_data.diffTime / 1000), Math.floor(vm_data.diffTime % 1000)];
                    vm_data.animationId = window.requestAnimationFrame(progress);
                }());
            },
            stop(){
                this.flag = false;   // ストップしたらタイマーflagをfalseに
                window.cancelAnimationFrame(this.animationId);
            },
            reset(){
                if(this.flag){
                    return false;
                }
                this.startTime = this.diffTime = 0;
            },
        },
        computed:{
            checkHours(){
                return Math.floor(this.diffTime / 1000 / 60 / 60);
            },
            checkMinutes(){
                return Math.floor(this.diffTime / 1000 / 60) % 60;
            },
            checkSeconds(){
                return Math.floor(this.diffTime / 1000) % 60;
            },
            checkMiliSeconds(){
                return Math.floor(this.diffTime % 1000);
            },
        }
    }


</script>
