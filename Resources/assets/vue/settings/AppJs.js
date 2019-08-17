
export default {

    props: ['urls'],
    computed:{
        ajax_url(){
            let ajax_url = this.$store.state.urls.settings;
            return ajax_url;
        }
    },
    components:{
    },
    data()
    {
        let obj = {
            list: null,
        };

        return obj;
    },
    watch: {



    },
    mounted() {
        //---------------------------------------------------------------------
        this.getTypes();
        //---------------------------------------------------------------------
    },
    methods: {
        //---------------------------------------------------------------------
        getTypes: function () {
            var url = this.ajax_url+"/types";
            var params = {};
            this.$vaahcms.ajax(url, params, this.getTypesAfter);
        },
        //---------------------------------------------------------------------
        getTypesAfter: function (data) {
            this.list = data;
            this.$vaahcms.stopNprogress();
        },
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
    }
}