<template>
    <div class="container">
        <div class="form-group">
            <label for="selectCategory">Product categorie</label>
            <select class="form-control" id="selectCategory" v-model="selectedCategory">
                <option value="Voorgerecht">Voorgerecht</option>
                <option value="Hoofdgerecht">Hoofdgerecht</option>
                <option value="Dessert">Dessert</option>
            </select>
        </div>
        <p>Geselecteerde categorie is: {{selectedCategory}}</p>
        <!--<p v-if="selectedCategory == 'Hoofdgerecht'">kaas</p>-->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                selectedCategory: ''
            }
        }
    }
</script>

<style scoped>

</style>