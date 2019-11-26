<template>
    <div class="container">
        <div class="form-group">
            <label for="selectCategory">Product categorie</label>
            <select class="form-control" id="selectCategory" v-on:change="sendCategory" name="selectedCategory"
                    v-model="selectedCategory">
                <option value="Voorgerecht">Voorgerecht</option>
                <option value="Hoofdgerecht">Hoofdgerecht</option>
                <option value="Dessert">Dessert</option>
            </select>
        </div>
        <div class="form-group">
            <label for="selectReservation" v-if="selectedCategory">Gerechten uit {{selectedCategory}}</label>
            <label for="selectReservation" v-else>Gerechten</label>
            <select multiple class="form-control" id="selectReservation" v-model="selectedProducts">
                <option v-for="(item, $index) in products" v-on:click="onChange(item)" :key="$index">{{ item.name }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                selectedCategory: '',
                products: '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                selectedProducts: []
            }
        },
        methods: {
            sendCategory() {
                axios.post('http://localhost:8000/beheer/createOrder', {category: this.selectedCategory}).then((response) => {
                    this.products = response.data;
                    console.log(this.products);
                })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            onChange(event) {
                this.selectedProducts.push(event);
                console.log(this.selectedProducts);
            }
        }
    }
</script>

<style scoped>

</style>