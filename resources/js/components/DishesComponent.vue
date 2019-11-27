<template>
    <div class="container">
        <form >
            <div class="form-group">
                <label for="selectCategory">Product categorie</label>
                <select class="form-control" id="selectCategory" v-on:change="sendCategory" name="selectedCategory"
                        v-model="selectedCategory">
                    <option value="Warme voorgerechten">Warme voorgerechten</option>
                    <option value="Koude voorgerechten">Koude voorgerechten</option>
                    <option value="Visgerechten">Visgerechten</option>
                    <option value="Vegetarische gerechten">Vegetarische gerechten</option>
                    <option value="Ijs">Ijs</option>
                    <option value="Mousse">Mousse</option>
                    <option value="Warme dranken">Warme dranken</option>
                    <option value="Bieren">Bieren</option>
                    <option value="Huiswijnen">Huiswijnen</option>
                    <option value="Frisdranken">Frisdranken</option>
                    <option value="Warme hapjes">Warme hapjes</option>
                    <option value="Koude hapjes">Koude hapjes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="selectReservation" v-if="selectedCategory">Gerechten uit {{selectedCategory}}</label>
                <label for="selectReservation" v-else>Gerechten</label>
                <select multiple class="form-control" id="selectReservation" v-model="selectedProducts">
                    <option v-for="(item, $index) in products" :key="$index">{{ item.name }}</option>
                </select>
                <button type="button" class="btn btn-success" v-on:click="addProducts($event)"><i
                        class="fas fa-plus"></i>
                    Voeg producten toe aan bestelling
                </button>

                <h3>Bestelling</h3>
                <div class="list-group">
                    <button type="button" v-for="product in chosenProducts"
                            class="list-group-item list-group-item-action">
                        {{product[0]}}
                    </button>
                    <button type="button" class="btn btn-success" v-if="chosenProducts.length > 0" v-on:click="sendOrder()"><i
                            class="fas fa-plus"></i>
                        Bestelling plaatsen
                    </button>
                </div>
            </div>
        </form>
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
                axios.post('/beheer/getProducts', {category: this.selectedCategory}).then((response) => {
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
                console.log(that.selectedProducts);
            },

            sendOrder() {
                const that = this;
                axios.post('/beheer/createOrder', that.chosenProducts).then((response) => {
                    console.log(response.data);
                })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>