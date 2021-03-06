/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import router from "./routes";
import VueRouter from "vue-router";
import Vue from "vue";
import Index from './Index.vue';
import moment from 'moment';


import StartRating from "./shared/components/StartRating";
import FatalError from "./shared/components/FatalError.vue";
import ValidationErrors from  "./shared/components/ValidationErrors";
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('example-2', require('./components/Example2Vue.vue').default);

Vue.use(VueRouter);
Vue.filter('fromNow', value => moment(value).fromNow());
Vue.component("star-rating", StartRating);
Vue.component("fatal-error", FatalError);
Vue.component("v-errors", ValidationErrors);
library.add(fas, far)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: {
        index: Index,
    }
});
