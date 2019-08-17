<template>
    <div>

          <div class="card">

                    <!--header-->
                    <div class="card-header">

                        <div class="d-flex">
                            <div class="align-self-center tx-18 flex-grow-1">
                                <h5>Orders</h5>
                            </div>
                            <div class=" mg-l-auto btn-group btn-group-xs">

                                <router-link class="btn btn-xs btn-light btn-uppercase"
                                             :to="{ path: '/orders/create'}">
                                    <i class="fas fa-plus"></i> Add New
                                </router-link>

                            </div>
                        </div>

                    </div>
                    <!--/header-->

                </div>


    </div>
</template>
<script>
    import pagination from 'laravel-vue-pagination';

    export default {

        props: ['urls'],
        computed:{
            ajax_url(){
                let ajax_url = null;
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
            document.title = "Orders";
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------

        },
        methods: {
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------
            //---------------------------------------------------------------------
        }
    }
</script>