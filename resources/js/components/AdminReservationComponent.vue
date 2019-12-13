<!-- todo edit app.js: Vue.component('component-name', require('./components/ComponentName.vue').default);-->

<template>
    <div class="container">
        <form style="width: 100%; align-items: center; display: flex; flex-direction: column; align-self: flex-start;"
              method="POST" action="/reservering">
            <input type="hidden" name="_token" :value="csrf"/>

            <div class="datepicker col-md-4">
                <label style="width: 100%">Datum:
                    // v-on:change wil start the function getDayOfWeek
                    // :min wil use the function to block the dates that are in the past
                    <input class="form-control"  v-on:change="getDayOfWeek" type="date" v-model="datePicker"
                           :min="minDateValue" name="date">
                </label>
            </div>

            <div class="space space--20"></div>

            // v-if wil check in value is set with a value and will show the div
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

                    <select v-on:click="getReserved" style="width: 100%" class="form-control"
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
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="20:15:00">20:15</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="20:30:00">20:30</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="20:45:00">20:45</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="21:00:00">21:00</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="21:15:00">21:15</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="21:30:00">21:30</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="21:45:00">21:45</option>
                        <option v-if="dayName === 'Friday' || dayName === 'Saturday'" value="22:00:00">22:00</option>
                    </select>
                </label>
            </div>

            <div class="space space--20"></div>

            <div class="amountpicker col-md-4" v-if="selectorTime">
                <label style="width: 100%">Aantal<br>
                    <input type="number" v-on:change="getReserved" name="people" v-model="people" min="1" max="58">
                </label>
            </div>

            <div class="space space--20"></div>

            <div class="tableGrid" v-if="people">

                <div class="row no-gutters">
                    // v-for will make a foreach loop of all the tables
                    <div :id="table.id" class="col-md-3 card reservation-checkbox text-center"
                         v-for="table in this.availableTables">

                        <label class="form-check-label" style="width: 100%; height: 100%; padding: 30px;">

                            <input class="form-check-input hide-checkbox" v-on:change="styleCheckbox()"
                                   type="checkbox" :value="table.id"
                                   name="checkedTable[]"
                                   v-model="checkedTable">

                            <span class="h4">
                                    Tafel {{table.id}}
                            </span>
                            <br>
                            <span class="h5">
                                    {{table.max_capacity}} stoelen
                            </span>

                        </label>

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
    </div>

</template>

<script>
    export default {
        name: "ReservationComponent",
        mounted() {
            // this will get all the tables from the DB
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
            // set all variables that will be used over the page
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
                max_capacity: 0,
                people: '',
                dayName: '',
                selectedPeople: '',
                // csrf id needed to sent data with a post trough laravel
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }

        },
        methods: {
            styleCheckbox() {

                let checkboxes = document.getElementsByClassName('reservation-checkbox');

                for (let i = 0; checkboxes.length > i; i++) {
                    checkboxes[i].classList.remove("reservation-checked");
                }

                for (let i = 0; this.checkedTable.length > i; i++) {
                    let checkbox = document.getElementById(this.checkedTable[i]);
                    checkbox.classList.add("reservation-checked");
                }

            },
            getReserved() {
                // reset checkTable and checkbox style.
                this.checkedTable = [];
                this.styleCheckbox();

                const that = this;
                axios
                    .get('/get-tables', {})
                    .then(response => {
                        that.allTables = response.data;
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
            },
            getDayOfWeek() {
                // will get the day of the week
                let d = new Date(this.datePicker);

                let weekday = new Array(7);
                weekday[0] = "Sunday";
                weekday[1] = "Monday";
                weekday[2] = "Tuesday";
                weekday[3] = "Wednesday";
                weekday[4] = "Thursday";
                weekday[5] = "Friday";
                weekday[6] = "Saturday";

                that.dayName = weekday[d.getDay()];
                console.log(that.dayName);
            }

        },

        computed: {
            minDateValue() {
                // get the day of today
                const today = new Date().toISOString();
                return today.substr(0, today.indexOf('T'));
            }
        }
    }
</script>
