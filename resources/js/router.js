import { createRouter, createWebHistory } from 'vue-router';
import ArticlesList from "./components/ArticlesList.vue";
import DetailArticle from "./components/DetailArticle.vue";

const routes = [
    { path: '/', component: ArticlesList },
    { name: 'detail' ,path: '/detail/:id', component: DetailArticle}
    //ajouter les autres routes et autres composants
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
