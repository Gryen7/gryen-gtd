/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

import MoreArticles from './more-articles.vue';

// noinspection ES6ModulesDependencies
new Vue({
    el: '#GryenApp',
    components: {
        MoreArticles
    }
});
