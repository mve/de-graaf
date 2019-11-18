<!-- todo edit app.js: Vue.component('component-name', require('./components/ComponentName.vue').default);-->
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h1>I'm an example component.</h1>
                        <form>
                            <div class="datepicker">
                                <label>Datum:
                                    <input type="date" v-model="datePicker" :min="minDateValue">
                                </label>
                            </div>
                            <div class="typepicker" v-if="datePicker">
                                <label>
                                    <select v-model="selectorType">
                                        <option v-for="selectorType in [ 'Lunch', 'Diner' ]">
                                            {{ selectorType }}
                                        </option>
                                    </select>
                                </label>
                            </div>
                            <div class="timepicker" v-if="selectorType">
                                <label>Tijd
                                    <select v-if="selectorType == 'Lunch'" v-model="selectorTime">
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                    </select>
                                    <select v-if="selectorType == 'Diner'" v-model="selectorTime">
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                        <option value="19">19:00</option>
                                        <option value="20">20:00</option>
                                        <option value="21">21:00</option>
                                        <option value="22">22:00</option>
                                    </select>
                                </label>
                            </div>
                            <div class="tableGrid" v-if="selectorTime">
                                <p style="color: red" v-if="checkedTable.length > 2"> Er zijn te veel tafels gereserveerd</p>
                                <div class="row">
                                    <div class="col-md-3" v-for="table in tables">
                                        {{table.id}}
                                        <label>
                                            <input type="checkbox" :value="table.id" v-model="checkedTable"> Tafel
                                            {{table.id}}. {{table.max_capacity}} stoelen
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div v-if="checkedTable.length > 0">
                                <button class="btn btn-primary">Reserveren</button>
                            </div>
                        </form>
                        <p>Message is: Datum:{{datePicker}} Type:{{selectorType}} Time:{{selectorTime}} selected table:
                            {{checkedTable}} er zijn: {{checkedTable.length}} geselecteerd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReservationComponent",
        props: ['tables'],
        mounted() {
            console.log('Component mounted.');


        },
        data: function () {
            return {
                datePicker: '',
                selectorType: '',
                selectorTime: '',
                checkedTable: []
            }
        },
        methods: {
            getTables(){

            },
            create(){

            }
        },
        computed: {
            minDateValue(){
                const today = new Date().toISOString();
                return today.substr(0, today.indexOf('T'));
            }
        }
    }
</script>
