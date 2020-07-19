require('./bootstrap');
window.Vue = require('vue');


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vue from 'vue'
import MeditationSet from "./components/MeditationSet";
import StopWatch from "./components/StopWatch";
import TodaysRecord from "./components/TodaysRecord";
import DayHours from "./components/DayHours";

const app = new Vue({
    el: '#app',
    components: {
        StopWatch,
        MeditationSet,
        DayHours,
        TodaysRecord,
    }
});
