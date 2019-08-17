import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);


//---------Variables
var base_url = $('base').attr('href');
var current_url = $('#current_url').attr('content');
var debug = $('#debug').attr('content');
//---------/Variables

export const store = new Vuex.Store({
    state: {
        debug: debug,
        urls: {
            base: base_url,
            current: current_url,
            settings: current_url+'/settings',
        },
        settings: {
            url: null,
        },
        menus: {
            assets: null,
        },
        app_assets: null,

    },
    mutations:{
        updateAssets: function (state, payload) {
            state[payload.type].assets = payload;
        },
        updateAppAssets: function (state, payload) {
            state.app_assets = payload;
        }
    },
    actions:{

    },
    getters:{

    }
});