
import 'bootstrap'
import Vue from 'vue'
import Navbar from './components/navbar.vue'
import News from './components/news.vue'

window.$ = window.jQuery = require('jquery')

new Vue({
    el: '#app',
    components: {
        Navbar,
        News,
    },
    computed: {
    },
    methods: {
        alert(value) {
            alert(value)
        }
    },
    mounted() {
        // Wait for jQuery to be ready.
        this.$nextTick(_ => {

        })
    }
})
