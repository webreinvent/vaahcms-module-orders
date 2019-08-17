<template>
    <div>


        <div class="row" v-if="list">
            <div class="col-sm pd-15">
                <h6 class="mg-b-0">Payment Gateways</h6>

                <div class="" v-for="item in list.value">

                    <!--paypal-->
                    <div v-if="item.slug == 'paypal'">

                        <div class="divider-text">{{item.name}}</div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                       v-model="item.enable" :id="item.slug">
                                <label class="custom-control-label" :for="item.slug">Enable PayPal</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm"
                                   v-model="item.paypal_client_id" placeholder="PayPal Client ID">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm"
                                   v-model="item.paypal_client_secrete" placeholder="PayPal Client Secrete">
                        </div>


                        <div class="form-group">
                            <select class="custom-select custom-select-sm" v-model="item.paypal_mode">
                                <option disable value="">Select Mode</option>
                                <option value="sandbox">Sandbox</option>
                                <option value="live">Live</option>
                            </select>
                        </div>

                    </div>
                    <!--/paypal-->

                </div>

                <button class="btn btn-primary" v-on:click="store()">Save</button>

            </div>

        </div>



    </div>
</template>
<script src="./PaymentGatewaysJs.js"></script>