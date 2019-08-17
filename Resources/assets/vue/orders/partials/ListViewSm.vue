<template>
    <div>
        <div class="card card-list-view ">

            <!--header-->
            <div class="card-header">

                <div class="d-flex">
                    <div class="align-self-center tx-18 flex-grow-1">
                        <h5 >Orders</h5>
                    </div>
                    <div class=" mg-l-auto btn-group btn-group-xs">

                        <router-link class="btn btn-xs btn-light btn-uppercase"
                                     :to="{ path: '/orders/create'}">
                            <i class="fas fa-plus"></i> Add New
                        </router-link>

                        <button class="btn btn-xs btn-light btn-uppercase">
                            <i class="fas fas fa-ellipsis-h"></i>
                        </button>

                    </div>
                </div>

            </div>
            <!--/header-->

            <!--body-->
            <div class="card-body pd-0">


                    <!--repeatable-->
                    <table class="table">

                        <tr class="bd-t-0-f">
                            <td class="pd-0-f bd-t-0-f">
                                <input type="text" placeholder="Search" class="form-control form-control-search">
                            </td>
                        </tr>

                        <tr>
                            <td>#332</td>
                        </tr>

                    </table>
                    <!--/repeatable-->

            </div>
            <!--/body-->

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