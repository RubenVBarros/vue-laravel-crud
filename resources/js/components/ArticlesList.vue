<script>
import axios from 'axios'
export default {
    data(){
        return {
            articles:[]
        }
    },
    created() {
        this.getAllArticles();
    },
    methods: {
        async getAllArticles(){
            const response = await axios.get('/api/articles');
            this.articles = response.data
        },
        async deleteArticle(id){
            await axios.delete(`/api/articles/${id}`);
            this.articles = this.articles.filter(article => article.id !== id);
        }
    }
}
</script>

<template>
    <div class="flex justify-center">
        <div class="mt-5">
            <h1 class="mt-3 underline font-bold">Liste des Articles</h1>
            <table class="justify-center border border-separate border-black border-8 border-spacing-2">
                <thead>
                <tr>
                    <th class="border border-slate-600">Id de l'article</th>
                    <th class="border border-slate-600">Titre</th>
                    <th class="border border-slate-600">Description</th>
                    <th class="border border-slate-600">Catégorie</th>
                    <th class="border border-slate-600">URL de l'image</th>
                    <th class="border border-slate-600">Actions</th>
                    <!-- <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
                <tr v-for="article in articles" :key="article.id">
                    <td class="border border-slate-600">{{article.id}}</td>
                    <td class="border border-slate-600">{{ article.titre }}</td>
                    <td class="border border-slate-600">{{ article.description }}</td>
                    <td class="border border-slate-600">{{ article.categorie }}</td>
                    <td class="border border-slate-600">{{ article.image_url }}</td>
                    <td>
                        <div class="btn-group flex space-x-4" role="group">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded" @click="deleteArticle(article.id)">Supprimer l'article</button>
                            <button class="bg-blue-500 hover:bg-blue-700 text-whhite font-bold px-4 py-2 rounded"> <router-link :to="{name: 'detail', params: { id: article.id }}" class="btn btn-success">Voir le détail</router-link> </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>

</style>
