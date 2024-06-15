import { createRouter, createWebHistory } from 'vue-router';
import ArticlesList from "./components/ArticlesList.vue";
import DetailArticle from "./components/DetailArticle.vue";
import FormArticle from "./components/FormArticle.vue";

const routes = [
    { path: '/', component: ArticlesList },
    { name: 'detail', path: '/articles/:id', component: DetailArticle},
    { name: 'edit', path:'/articles/:id/edit', component: FormArticle },
    { name: 'create', path: '/articles/create', component: FormArticle}
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
