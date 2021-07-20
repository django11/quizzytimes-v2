import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        admin: null
    },
    getters: {
        getAdmin() {
            return state.admin;
        }
    },
    actions: {
        setAdmin({commit}, admin) {
            commit('SET_ADMIN', admin);
        }
    },
    mutations: {
        'SET_ADMIN': function(state, admin) {
            state.admin = admin
        }
    },
});

export default store;
