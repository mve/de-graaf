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
                <option v-for="(item, $index) in products" :key="$index">{{ item.name }}</option>
            </select>
            <button type="button" class="btn btn-success" v-on:click="addProducts($event)"><i class="fas fa-plus"></i>
                Voeg producten toe aan bestelling
            </button>

            <h3>Bestelling</h3>
            <div class="list-group">
                <button type="button" v-for="product in chosenProducts" class="list-group-item list-group-item-action">
                    {{product[0]}}
                </button>
            </div>
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
                selectedProducts: [],
                chosenProducts: []
            }
        },
        methods: {
            sendCategory() {
                axios.post('/beheer/createOrder', {category: this.selectedCategory}).then((response) => {
                    this.products = response.data;
                    console.log(this.products);
                })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            addProducts(event) {
                const that = this;
                that.chosenProducts.push(that.selectedProducts);
                console.log(that.chosenProducts);
            }
        }
    }
</script>

<style scoped>

</style>