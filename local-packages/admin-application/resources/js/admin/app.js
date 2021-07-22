import Vue from 'vue';
import Vuex from 'vuex'

Vue.use(Vuex);

import router from "./core/routes";
import store from "./core/store";
import Main from "./core/layouts/Main";

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.withCredentials = true;

Promise.all([
    store.dispatch('setLoggedAdmin'),
]).finally(() => {
    new Vue({
        el: '#app',
        template: '<Main/>',
        components: { Main },
        router,
        store
    });
});
