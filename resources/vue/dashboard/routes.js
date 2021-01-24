import ArticleManager from './ArticleManager.vue';
import PubAnalytics from './PubAnalytics.vue';

const routes = [
    { path: '/', redirect: '/pub_analytics' },
    { path: '/article_manager', component: ArticleManager },
    { path: '/pub_analytics', component: PubAnalytics }
];

export default routes;
