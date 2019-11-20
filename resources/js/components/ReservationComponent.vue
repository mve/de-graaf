<!-- todo edit app.js: Vue.component('component-name', require('./components/ComponentName.vue').default);-->

<template>
    <div class="container">
        <form style="width: 100%; align-items: center; display: flex; flex-direction: column; align-self: flex-start;"
              method="POST" action="/reservering">
            <input type="hidden" name="_token" :value="csrf"/>

            <div class="datepicker col-md-4">
                <label style="width: 100%">Datum:
                    <input class="form-control" type="date" v-model="datePicker" :min="minDateValue" name="date">
                </label>
            </div>

            <div class="space space--20"></div>

            <div class="typepicker col-md-4" v-if="datePicker">
                Lunch of diner?

                <div class="row" style="padding: 0 15px;">

                    <div class="col-md-6">

                        <div style="width: 100%" class="btn"
                             :class="selectorType === 'Lunch' ? 'btn-primary' : 'btn-outline-primary'"
                             v-on:click="setSelectorType('Lunch')">
                            Lunch
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div style="width: 100%" class="btn"
                             :class="selectorType === 'Diner' ? 'btn-primary' : 'btn-outline-primary'"
                             v-on:click="setSelectorType('Diner')">
                            Diner
                        </div>

                    </div>

                </div>

                <!--                    <select class="form-control" name="selectorType" v-model="selectorType">-->
                <!--                        <option v-for="selectorType in [ 'Lunch', 'Diner' ]">-->
                <!--                            {{ selectorType }}-->
                <!--                        </option>-->
                <!--                    </select>-->

            </div>

            <div class="space space--20"></div>

            <div class="timepicker col-md-4" v-if="selectorType">
                <label style="width: 100%">Tijd
                    <select class="form-control" name="selectorTime" v-if="selectorType == 'Lunch'"
                            v-model="selectorTime">
                        <option value="10">10:00</option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                    </select>

                    <select style="width: 100%" class="form-control" v-if="selectorType == 'Diner'" name="selectorTime"
                            v-model="selectorTime">
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                    </select>
                </label>
            </div>

            <div class="space space--20"></div>

            <div class="tableGrid" v-if="selectorTime">
                <div class="row">
                    <div class="col-md-3" v-for="table in tables">

                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" :value="table.id" name="checkedTable[]"
                                       v-model="checkedTable">
                                Tafel {{table.id}}. {{table.max_capacity}} stoelen
                            </label>
                        </div>

                    </div>
                </div>
                
                <div class="space space--10"></div>

                <div v-if="checkedTable.length > 2" class="alert alert-danger" role="alert">
                    Er zijn te veel tafels geselecteerd.
                    Neem contact met ons op om meer te reserveren.
                </div>

            </div>

            <div class="space space--20"></div>

            <div v-if="checkedTable.length > 0">
                <label>Heeft u dingen die wij moeten weten. bv: dieet wensen<br>
                    <textarea class="form-control" name="comment" v-model="comment"></textarea>
                </label>
            </div>

            <div v-if="checkedTable.length > 0">
                <div v-if="checkedTable.length < 3">
                    <button type="submit" value="submit" class="btn btn-primary">
                        Reserveren
                    </button>
                </div>
            </div>

        </form>

        <!--        <p>Message is: Datum:{{datePicker}} Type:{{selectorType}} Time:{{selectorTime}} selected table:-->
        <!--            {{checkedTable}} er zijn: {{checkedTable.length}} geselecteerd</p>-->
    </div>

</template>

<script>
    export default {
        name: "ReservationComponent",
        props: ['tables'],
        mounted() {

        },
        data() {
            return {
                datePicker: '',
                selectorType: '',
                selectorTime: '',
                checkedTable: [],
                comment: '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }

        },
        methods: {
            submit() {
            },
            setSelectorType(selector) {
                this.selectorType = selector;
            }
        },
        computed: {
            minDateValue() {
                const today = new Date().toISOString();
                return today.substr(0, today.indexOf('T'));
            }
        }
    }
</script>
