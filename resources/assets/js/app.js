
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
window.$ = window.jQuery = require('jquery')


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import GalleryLevel from './components/GalleryLevel.vue'
import ExempleComponent from './components/ExampleComponent.vue'
import { mapGetters } from 'vuex'

Vue.use(require('vuex'))

/* Mobil Detect */
var MobileDetect = require('mobile-detect')
const shared = {
    mb: new MobileDetect(window.navigator.userAgent),
    mySharedMethod(){
        //do shared stuff
    }
}

const app = new Vue({
    el: '#app',

    data: {
      shared
    },

    components: {
        GalleryLevel,
        ExempleComponent
    },

    computed: {
        ...mapGetters('events', [
            'canOrder'
        ])
    }
});


console.log(md.ua)