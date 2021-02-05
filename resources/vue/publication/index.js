window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

import { createApp } from 'vue';

import MoreArticles from './more-articles.vue';

createApp(MoreArticles).mount('#PublicationVue');
