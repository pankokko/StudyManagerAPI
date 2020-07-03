require('./bootstrap');
window.Vue = require('vue');


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vue from 'vue'
import App from './components/App.vue'
import Chart from './components/Chart.vue'

new Vue({
    render: h => h(App),

}).$mount('#app2')

new Vue({
    render: h => h(Chart),

}).$mount('#app2')

const app = new Vue({
    el: '#app',
    components: {
        Chart,
    },
});
