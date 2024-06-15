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
        }
    }
}
</script>

<template>
    <div class="flex justify-center">
        <div class="mt-5">
            <h5>Titre : </h5>
            <h6>{{article.titre}}</h6>

            <h5>Description : </h5>
            <p>{{article.description}}</p>

            <h5>Catégorie : </h5>
            <p>{{article.categorie}}</p>

            <h5>URL de l'image : </h5>
            <p>{{article.image_url}}</p>
        </div>
    </div>
</template>

<style scoped>

</style>
