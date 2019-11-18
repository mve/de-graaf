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
                                    <input type="date" v-model="datePicker">
                                </label>
                            </div>
                            <div class="typepicker" v-if="datePicker">
                                <label>
                                    <select v-model="selectorType">
                                        <option value="Lunch">Lunch</option>
                                        <option value="Diner">Diner</option>
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
                                <div class="row">
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="1" v-model="checkedTable"> Tafel 1. 2 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="2" v-model="checkedTable"> Tafel 2. 2 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="3" v-model="checkedTable"> Tafel 3. 2 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="4" v-model="checkedTable"> Tafel 4. 4 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="5" v-model="checkedTable"> Tafel 5. 4 stoelen
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="6" v-model="checkedTable"> Tafel 6. 4 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="7" v-model="checkedTable"> Tafel 7. 4 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="8" v-model="checkedTable"> Tafel 8. 4 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="9" v-model="checkedTable"> Tafel 9. 4 stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="10" v-model="checkedTable"> Tafel 10. 4
                                            stoelen
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="11" v-model="checkedTable"> Tafel 11. 8
                                            stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="12" v-model="checkedTable"> Tafel 12. 8
                                            stoelen
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label>
                                            <input type="checkbox" value="13" v-model="checkedTable"> Tafel 13. 8
                                            stoelen
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p>Message is: Datum:{{datePicker}} Type:{{selectorType}} Time:{{selectorTime}} selected table:
                            {{checkedTable}}</p>
                    </div>
                </div>
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
                datePicker: '',
                selectorType: '',
                selectorTime: '',
                checkedTable: []
            }
        }
    }
</script>
