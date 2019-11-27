<!-- todo edit app.js: Vue.component('component-name', require('./components/ComponentName.vue').default);-->

<template>
    <div class="container">
        <form style="width: 100%; align-items: center; display: flex; flex-direction: column; align-self: flex-start;"
              method="POST" action="/reservering">
            <input type="hidden" name="_token" :value="csrf"/>

            <div class="datepicker col-md-4">
                <label style="width: 100%">Datum:
                    <input class="form-control" v-on:change="getReserved" type="date" v-model="datePicker"
                           :min="minDateValue" name="date">
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
            </div>

            <div class="space space--20"></div>

            <div class="timepicker col-md-4" v-if="selectorType">
                <label style="width: 100%">Tijd
                    <select v-on:click="getReserved" class="form-control" name="selectorTime"
                            v-if="selectorType === 'Lunch'"
                            v-model="selectorTime">
                        <option value="12:00:00">12:00</option>
                        <option value="12:15:00">12:15</option>
                        <option value="12:30:00">12:30</option>
                        <option value="12:45:00">12:45</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:15:00">13:15</option>
                        <option value="13:30:00">13:30</option>
                        <option value="13:45:00">13:45</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:15:00">14:15</option>
                        <option value="14:30:00">14:30</option>
                        <option value="14:45:00">14:45</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:15:00">15:15</option>
                        <option value="15:30:00">15:30</option>
                        <option value="15:45:00">15:45</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:15:00">16:15</option>
                        <option value="16:30:00">16:30</option>
                        <option value="16:45:00">16:45</option>
                    </select>

                    <select v-on:change="getReserved" style="width: 100%" class="form-control"
                            v-if="selectorType === 'Diner'" name="selectorTime"
                            v-model="selectorTime">
                        <option value="17:00:00">17:00</option>
                        <option value="17:15:00">17:15</option>
                        <option value="17:30:00">17:30</option>
                        <option value="17:45:00">17:45</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:15:00">18:15</option>
                        <option value="18:30:00">18:30</option>
                        <option value="18:45:00">18:45</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:15:00">19:15</option>
                        <option value="19:30:00">19:30</option>
                        <option value="19:45:00">19:45</option>
                        <option value="20:00:00">20:00</option>
                    </select>
                </label>
            </div>

            <div class="space space--20"></div>

            <div class="amountpicker col-md-4" v-if="selectorTime">
                <label style="width: 100%">Aantal<br>
                    <input type="number" name="people" v-model="people" min="1" max="58">
                </label>
            </div>

            <div class="space space--20"></div>

            <div class="tableGrid" v-if="people">
                <div class="row">
                    <div class="col-md-3" v-for="table in this.availableTables">

                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" :value="table.id" name="checkedTable[]"
                                       v-model="checkedTable">
                                Tafel {{table.id}}. {{table.max_capacity}} stoelen
                            </label>
                        </div>

                    </div>
                </div>

            </div>

            <div class="space space--20"></div>

            <div v-if="checkedTable.length > 0">
                <label>Heeft u dingen die wij moeten weten. bv: dieet wensen<br>
                    <textarea class="form-control" name="comment" v-model="comment"></textarea>
                </label>
            </div>

            <div v-if="checkedTable.length > 0">
                <button type="submit" value="submit" class="btn btn-primary">
                    Reserveren
                </button>
            </div>

        </form>

        <!--        <p>Message is: Datum:{{datePicker}} Type:{{selectorType}} Time:{{selectorTime}} selected table:-->
        <!--            {{checkedTable}} er zijn: {{checkedTable.length}} geselecteerd</p>-->
    </div>

</template>

<script>
    export default {
        name: "ReservationComponent",
        mounted() {

            axios
                .get('/get-tables')
                .then(response => {
                    this.allTables = response.data;
                })
                .catch(error => {
                    console.log(error);
                    this.errored = true
                })

        },
        data() {
            return {
                messages: '',
                error: '',
                datePicker: '',
                allTables: [],
                allTablesCap: [],
                availableTables: [],
                selectorType: '',
                selectorTime: '',
                checkedTable: [],
                comment: '',
                reservedTables: [],
                people: '',
                selectedPeople: '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }

        },
        methods: {
            submit() {
            },
            setSelectorType(selector) {
                this.selectorType = selector;
            },
            log() {
                console.log("testing this");
            },
            getReserved() {
                const that = this;
                axios
                    .post('/get-tables-cap', {
                        people: this.people
                    })
                    .then(response => {
                        that.allTablesCap = response.data;
                        console.log(that.allTablesCap);
                    })
                    .catch(error => {
                        console.log(error);
                        this.errored = true
                    }).then(
                    axios
                        .post('/get-reserved', {
                            date: this.datePicker,
                            time: this.selectorTime
                        })
                        .then(response => {
                            that.reservedTables = [];
                            that.availableTables = that.allTables;
                            console.log(that.reservedTables);

                            for (let i = 0; i < response.data.length; i++) {
                                response.data[i].tables.forEach(function (item) {
                                    that.reservedTables.push(item);
                                })
                            }

                            for (let i = that.availableTables.length - 1; i >= 0; i--) {
                                for (let j = 0; j < that.reservedTables.length; j++) {
                                    if (that.availableTables[i] && (that.availableTables[i].id === that.reservedTables[j].id)) {
                                        that.availableTables.splice(i, 1);
                                    }
                                }
                            }
                        })
                        .catch(error => {
                            console.log(error);
                            this.errored = true
                        })
                );
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
