<script>
import axios from 'axios';

export default {
    data() {
        return {
            article: {
                titre: '',
                description: '',
                categorie: '',
                image_url: ''
            }
        }
    },
    computed: {
        newArticle() {
            return !this.$route.path.includes('edit');
        }
    },
    async created() {
        if (!this.newArticle) {//on modifie un article
            const response = await axios.get(`/api/articles/${this.$route.params.id}`);
            this.article = response.data;
        }
    },
    methods: {
        async submitForm() {
            try {
                if (this.newArticle) {//on crée un article
                    await axios.post('/api/articles', this.article);
                } else {
                    await axios.put(`/api/articles/${this.$route.params.id}`, this.article);
                }
                this.$router.push('/');
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>

<template>
    <div>
        <h2 v-if="newArticle">Ajouter un article</h2>
        <h2 v-else>Modifier un article</h2>
        <form @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name" class="form-label">Titre : </label>
                <input class="form-control" type="text" id="name" v-model="article.titre" required />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description : </label>
                <textarea class="form-control" id="description" v-model="article.description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Catégorie : </label>
                <input class="form-control" type="text" id="price" v-model="article.categorie" required />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">URL de l'image : </label>
                <input class="form-control" type="text" id="price" v-model="article.image_url" required />
            </div>
            <button type="submit" v-if="newArticle" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Ajouter un article</button>
            <button type="submit" v-else class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Modifier l'article</button>
        </form>
    </div>
</template>

<style scoped>

</style>
