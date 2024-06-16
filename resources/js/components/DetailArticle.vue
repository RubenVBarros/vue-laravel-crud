<script>
import axios from 'axios'
export default {
    data(){
        return{
            article: {}
        }
    },
    created(){
        this.getArticle();
    },
    methods:{
        async getArticle(){
            const response = await axios.get(`/api/articles/${this.$route.params.id}`)
            this.article = response.data;
            this.article.created_at = new Date(response.data.created_at)//on redéfinit la date
        }
    }
}
</script>

<template>
    <div class="bg-blue-200 min-h-screen flex justify-center">
        <div class="mt-5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto">
                    <!-- Blog post header -->
                    <div class="py-8">
                        <h1 class="text-3xl text-blue-400 font-bold mb-2 uppercase">{{article.titre}}</h1>
                        <p class="text-gray-500 text-sm">Publié le : {{article.created_at.getDate() + '/' + (article.created_at.getMonth()+1) + '/' +  article.created_at.getFullYear()}}</p>
                        <p >Dans la catégorie : {{article.categorie}}</p>
                    </div>

                    <!-- Featured image -->
                    <img class="w-full h-auto mb-9 rounded" :src="article.image_url"/>

                    <!-- Blog post content -->
                    <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl mx-auto">
                        <p>{{article.description}}</p>
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded mt-10 mb-10"> <router-link :to="{name: 'edit', params: { id: article.id }}">Modifier l'article</router-link> </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
