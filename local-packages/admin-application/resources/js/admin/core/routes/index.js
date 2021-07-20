import Login from "../../modules/auth/pages/Login";

import VueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(VueRouter)

const routes = {
    mode: 'history',

    routes: [
        {
            path: '/admin/login',
            component: Login,
            name: 'login'
        },
    ]
}

const router  = new VueRouter(routes);

export default router;
