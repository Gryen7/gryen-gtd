/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import routes from './routes';
import Home from './Home.vue';


const router = createRouter({
    history: createWebHashHistory(),
    routes
});

createApp(Home).use(router).mount('#DashboardVue');
