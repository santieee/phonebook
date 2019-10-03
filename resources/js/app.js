require('./bootstrap');

import App from './app.vue'
import Vue from 'vue';

const app = new Vue({
    render: h => h(App)
}).$mount('#app');