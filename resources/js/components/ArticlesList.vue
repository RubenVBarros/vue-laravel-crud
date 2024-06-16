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
    <div class="bg-blue-200 min-h-screen flex justify-center items-center">
        <div class="mt-5">
            <h1 class="font-bold text-center text-blue-400 text-2xl uppercase mb-20">Liste des Articles</h1>
            <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
                <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                    <div class="p-6" v-for="article in articles" :key="article.id">
                        <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded-xl" :src="article.image_url"/>

                        <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">{{article.titre}}</h1>
                        <p class="mx-auto text-base leading-relaxed text-gray-500">{{article.description}}</p>
                        <div class="btn-group flex space-x-4" role="group">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded" @click="deleteArticle(article.id)">Supprimer l'article</button>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded"> <router-link :to="{name: 'detail', params: { id: article.id }}">Voir le détail</router-link> </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded mb-10"> <router-link :to="{name: 'create'}"> Ajouter un article </router-link> </button>
        </div>
    </div>
</template>

<style scoped>

</style>
