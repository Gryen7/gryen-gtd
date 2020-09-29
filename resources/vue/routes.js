import siteManager from './components/dashboard/siteManager.vue';
import articleManager from './components/dashboard/articleManager.vue';
import pubAnalytics from './components/dashboard/pubAnalytics.vue';

const routes = [
    { path: '/', redirect: '/pub_analytics' },
    { path: '/site_manager', component: siteManager },
    { path: '/article_manager', component: articleManager },
    { path: '/pub_analytics', component: pubAnalytics }
];

export default routes;
