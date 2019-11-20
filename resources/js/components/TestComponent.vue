<!-- todo edit app.js: Vue.component('component-name', require('./components/ComponentName.vue').default);-->
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">test Component</div>

                    <div class="card-body">
                        <h1>I'm a test component.</h1>

                        <select id="selectorType" v-model="selectedTime">
                            <option value="Lunch">Lunch</option>
                            <option value="Diner">Diner</option>
                        </select>

                        <p>Message is: {{ selectedTime }}</p>
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
                selectedTime: ''
            }
        }
    }
</script>
