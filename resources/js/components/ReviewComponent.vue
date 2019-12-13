<!-- todo edit app.js: Vue.component('component-name', require('./components/ComponentName.vue').default);-->
<template>


    <form id="contact-form" name="contact-form" method="POST"  action="/review">
        <input type="hidden" name="_token" :value="csrf"/>
        <input v-model="test" type="hidden" id="rating" name="rating" class="form-control">

        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <label for="subject" class="h3">Beoordeling</label>
                    <div class="d-flex justify-content-center mb-2">
                    <star-rating v-model="test" :increment="0.5" :show-rating="false"
                                  active-color="#000"></star-rating>
                    </div>
                </div>
            </div>
        </div>



        <div class="space space--20"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <label for="subject" class="h3">Onderwerp</label>
                    <input type="text" id="subject" name="subject" class="form-control">
                </div>
            </div>
        </div>

        <div class="space space--20"></div>

        <div class="md-form">
            <label for="message" class="h3">Jouw bericht</label>
            <textarea type="text" id="message" name="message" rows="4"
                      class="form-control md-textarea"></textarea>
        </div>

        <div class="space space--20"></div>

        <div class="text-center text-md-left">
            <button type="submit" class="btn btn-primary btn-lg text-white">Verstuur</button>
        </div>
    </form>
</template>

<script>
    import StarRating from 'vue-star-rating'

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                test: 0,
                selectedTime: '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content

            }
        },
        components: {
            StarRating
        }
    }
</script>
