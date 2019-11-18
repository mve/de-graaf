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
                            <div class="typepicker">
                                <label>
                                    <select v-model="selectorType">
                                        <option value="Lunch">Lunch</option>
                                        <option value="Diner">Diner</option>
                                    </select>
                                </label>
                            </div>
                            <div class="timepicker">
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
                            <div class="row">
                                <div class="col">
                                    Tafel 1. 2 stoelen
                                    <br>
                                </div>
                                <div class="col">
                                    Tafel 2. 2 stoelen
                                </div>
                                <div class="col">
                                    Tafel 3. 2 stoelen
                                </div>
                                <div class="col">
                                    Tafel 4. 4 stoelen
                                </div>
                                <div class="col">
                                    Tafel 5. 4 stoelen
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Tafel 6. 4 stoelen
                                </div>
                                <div class="col">
                                    Tafel 7. 4 stoelen
                                </div>
                                <div class="col">
                                    Tafel 8. 4 stoelen
                                </div>
                                <div class="col">
                                    Tafel 9. 4 stoelen
                                </div>
                                <div class="col">
                                    Tafel 10. 4 stoelen
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Tafel 11. 8 stoelen
                                </div>
                                <div class="col">
                                    Tafel 12. 8 stoelen
                                </div>
                                <div class="col">
                                    Tafel 13. 8 stoelen
                                </div>
                            </div>
                        </form>
                        <p>Message is: Datum:{{datePicker}} Type:{{selectorType}} Time:{{selectorTime}}</p>
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
                selectorTime: ''
            }
        }
    }
</script>
