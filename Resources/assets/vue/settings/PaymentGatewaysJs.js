import pagination from 'laravel-vue-pagination';

export default {

    props: ['urls'],
    computed:{
        ajax_url(){
            let ajax_url = this.$store.state.urls.settings;
            return ajax_url;
        }
    },
    components:{
        'pagination': pagination,
    },
    data()
    {
        let obj = {
            assets: null,
            q: null,
            page: 1,
            list: null,
            active_item: null,
            active_el: null,
            filters: {
                q: null,
            }
        };

        return obj;
    },
    watch: {



    },
    mounted() {

        //---------------------------------------------------------------------

        this.getPaymentGateways();

        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------

    },
    methods: {
        //---------------------------------------------------------------------
        getPaymentGateways: function () {
            var url = this.ajax_url+"/payment/gateways";
            var params = {};
            this.$vaahcms.ajax(url, params, this.getPaymentGatewaysAfter);
        },
        //---------------------------------------------------------------------
        getPaymentGatewaysAfter: function (data) {
            this.list = data;
            this.$vaahcms.stopNprogress();
        },
        //---------------------------------------------------------------------
        store: function () {
            var url = this.ajax_url+"/payment/gateways/store";
            var params = this.list;
            this.$vaahcms.ajax(url, params, this.storeAfter);
        },
        //---------------------------------------------------------------------
        storeAfter: function (data) {

            this.$vaahcms.stopNprogress();
        },
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
    }
}