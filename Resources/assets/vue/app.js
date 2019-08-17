window.Vue = require('vue');


//---------Package imports
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import Vuex from 'vuex'
import moment from 'moment'

import VaahCms from 'vaahcms-vue-helpers';
//---------/Package imports

//---------Configs
Vue.config.delimiters = ['@{{', '}}'];
Vue.config.async = false;
//---------Configs

//---------Helpers
Vue.prototype.moment = moment;
Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(require('vue-faker'));
Vue.use(VaahCms);
//---------/Helpers

//---------Import Partials
import TopMenu from './partials/TopMenu';
//---------/Import Partials


//---------Store
import {store} from './app-store';
//---------/Store

//---------Routes
import routes from './app-routes';

const router = new VueRouter({
    base: '/',
    linkActiveClass: "",
    routes: routes
});
//---------/Routes



const app = new Vue({
    el: '#app',
    components:{
        'top-menu': TopMenu
    },
    store: store,
    router,
    computed:{
        ajax_url(){
            let ajax_url = this.$store.state.urls.current;
            return ajax_url;
        }
    },
    data: {

    },
    mounted() {
        //--------------------------------------
        this.getAppAssets();
        //--------------------------------------
        this.$root.$on('getAppAssetsReloadEvent', () => {
            this.getAppAssets();
        });
        //--------------------------------------
        //--------------------------------------
        //--------------------------------------
    },
    methods:{

        getAppAssets: function () {
            var url = this.ajax_url+"/assets";
            var params = {};
            this.$vaahcms.ajax(url, params, this.getAppAssetsAfter);
        },
        //---------------------------------------------------------------------
        getAppAssetsAfter: function (data) {

            console.log('app_assets-->',data);

            this.$store.commit('updateAppAssets', data);

            this.$vaahcms.stopNprogress();
        },

    }
});