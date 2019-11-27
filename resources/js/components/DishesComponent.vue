
<template>

        <form>
            <div class="form-group">

                    <label for="selectReservation">Reserveringen van vandaag</label>
                    <select   class="form-control" id="reservations" @change="onChange($event)" name="reservations">
                        <option disabled selected> -- Selecteer een tafel -- </option>
                        <option v-for="res in this.unsortedreservations" :value="res.id">{{res.time}} - Reservering van: {{res.user.name}} Tafel(s): <span v-for="table in res.tables">{{table.id}}, </span></option>

                    </select>

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
                        1x {{product[0]}}
                    </button>
                    <button type="button" class="btn btn-success" v-if="chosenProducts.length > 0" v-on:click="sendOrder()"><i
                            class="fas fa-plus"></i>
                        Bestelling plaatsen
                    </button>
                </div>
            </div>
            <div >
                <h1>{{message}}</h1>
            </div>
        </form>


</template>

<script>

    export default {

        props: ['unsortedreservations'],

        mounted() {

            console.log();
            for (let i = 0; i < this.unsortedreservations.length; i++) {
                console.log(this.unsortedreservations[i].id);
            }
            console.log(this.unsortedreservations);
        },
        data: function () {
            return {
                selectedCategory: '',
                products: '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                selectedProducts: [],
                chosenProducts: [],
                chosenReservation: '',
                message: '',
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
            onChange(event) {
                this.chosenReservation= event.target.value;
            },

            addProducts(event) {
                const that = this;
                that.chosenProducts.push(that.selectedProducts);
                console.log(that.selectedProducts);
            },

            sendOrder() {
                const that = this;
                console.log("Reserving:" +that.chosenReservation);


                axios.post('/beheer/createOrder', {'products': that.chosenProducts, 'reservationid': that.chosenReservation}).then((response) => {
                  console.log(response.data);

                    this.$toasted.show("Bestelling aangemaakt", {
                        theme: "toasted-primary",
                        position: "top-right",
                        duration : 5000
                    });
                    this.chosenProducts = [];

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
