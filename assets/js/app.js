import 'bootstrap'
import toastr from 'toastr'
import Vue from 'vue'

import Navbar from './components/navbar.vue'
import News from './components/news.vue'

flashAlerts.forEach(function(flashAlert){
    //console.log(flashAlert);
    console.log(Object.keys(flashAlert)[0])
    console.log(Object.values(flashAlert)[0])
    toastr[Object.keys(flashAlert)[0]](Object.values(flashAlert)[0])
})

//readFlashMessage()

var vm = new Vue({
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