import Vue from 'vue';

// window.Vue = require('vue');

import VueSocialSharing from 'vue-social-sharing'
Vue.use(VueSocialSharing);

import VueCookies from 'vue-cookies';
Vue.use(VueCookies)

import Quiz from "./modules/quizzes/components/Quiz";
import CookieLaw from "./modules/cookies/components/CookieLaw";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('quiz', Quiz);
Vue.component('cookie-law', CookieLaw);
// Vue.component('loader', require('./components/Loader.vue').default);
// Vue.loadScript("https://live.demand.supply/up.js");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
