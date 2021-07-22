import Vue from 'vue'
import Vuex from 'vuex'
import AuthRepository from "../../modules/auth/repositories/AuthRepository";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        admin: null
    },
    getters: {
        getAdmin(state) {
            return state.admin;
        },
    },
    actions: {
        setLoggedAdmin({commit, state}) {
            AuthRepository.getAuthenticatedUser().then((data) => {
                commit('SET_ADMIN', data);
            });
        }
    },
    mutations: {
        'SET_ADMIN': function(state, admin) {
            console.log('aaa', admin)
            state.admin = admin
        }
    },
});

export default store;
