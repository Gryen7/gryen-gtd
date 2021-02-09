const ArticleManager = () => import('./ArticleManager');
const PubAnalytics = () => import('./PubAnalytics');
const CreateArticle = () => import('./CreateArticle');

const routes = [
    { path: '/', redirect: '/pub_analytics' },
    { path: '/article_manager', component: ArticleManager },
    { path: '/pub_analytics', component: PubAnalytics },
    { path: '/create_article', component: CreateArticle }
];

export default routes;
