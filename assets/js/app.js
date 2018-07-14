import 'bootstrap'
import toastr from 'toastr'
import Vue from 'vue'

import Navbar from './components/navbar.vue'
import News from './components/news.vue'
import HommeSlider from './components/homme-slider.vue'

import './modules/notes'

flashAlerts.forEach(function(flashAlert){
    toastr[Object.keys(flashAlert)[0]](Object.values(flashAlert)[0])
})

var vm = new Vue({
    el: '#app',
    components: {
        Navbar,
        News,
        HommeSlider
    },
    computed: {
    },
    methods: {
        alert(value) {
            alert(value)
        }
    },
    beforeMount: function() {
        //this.user = JSON.parse(this.$el.attributes['data-user']).value;
        //this.username = this.user.name;
    },
    mounted() {
        // Wait for jQuery to be ready.
        this.$nextTick(_ => {

        })
    }
})
