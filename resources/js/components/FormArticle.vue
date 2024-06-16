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
    <div class="bg-blue-200 min-h-screen flex items-center">
        <div class="w-full">
            <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-20" v-if="newArticle">Ajouter un article</h2>
            <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-20" v-else>Modifier un article</h2>
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg-w-1/2">
                <form @submit.prevent="submitForm">
                    <div class="mb-5">
                        <label for="name" class="block mb-2 font-bold text-gray-600">Titre : </label>
                        <input class="border shadow p-3 w-full rounded mb-" type="text" id="name" v-model="article.titre" required />
                    </div>
                    <div class="mb-5">
                        <label for="description" class="block mb-2 font-bold text-gray-600">Description : </label>
                        <textarea class="border shadow p-3 w-full rounded mb-" id="description" v-model="article.description" required></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="price" class="block mb-2 font-bold text-gray-600">Catégorie : </label>
                        <input class="border shadow p-3 w-full rounded mb-" type="text" id="price" v-model="article.categorie" required />
                    </div>
                    <div class="mb-5">
                        <label for="price" class="block mb-2 font-bold text-gray-600">URL de l'image : </label>
                        <input class="border shadow p-3 w-full rounded mb-" type="text" id="price" v-model="article.image_url" required />
                    </div>
                    <button type="submit" v-if="newArticle" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg hover:bg-blue-700">Ajouter un article</button>
                    <button type="submit" v-else class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg hover:bg-blue-700">Modifier l'article</button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
