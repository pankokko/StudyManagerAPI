require('./bootstrap');
window.Vue = require('vue');


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('monthly-chart', ("./components/MonthlyChartComponent.vue").default);

import Vue from 'vue'
import MeditationSet from "./components/MeditationSet";
import StopWatch from "./components/StopWatch";
import TodaysRecord from "./components/TodaysRecord";
import StudyTable from "./components/StudyTable";
import MonthlyChart from "./components/MonthlyChartComponent";
import VueTimepicker from 'vue2-timepicker/src/vue-timepicker.vue';

const app = new Vue({
    el: '#app',
    components: {
        StopWatch,
        MeditationSet,
        StudyTable,
        TodaysRecord,
        MonthlyChart,
        VueTimepicker,
    }
});
