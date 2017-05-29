/**
 * Created by targaryen on 2017/5/26.
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('handicraftList', require('./components/handicrafs/handicraftList.vue'));
Vue.component('scrollToTop', require('./components/plugins/scrollToTop.vue'));

const handicraftApp = new Vue({
    el: '#handicraftApp'
});