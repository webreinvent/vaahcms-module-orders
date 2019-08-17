<template>
    <div>


        <div class="row" v-if="list">
            <div class="col-sm pd-15">
                <h6 class="mg-b-0">General Settings</h6>

                <hr/>

                <div class="" v-for="item in list">

                    <div v-if="item.key == 'payment_success_url'">

                        <div class="form-group">
                            <label>Payment Success URL:</label>
                            <input type="text" class="form-control form-control-sm"
                                   v-model="item.value" placeholder="">
                        </div>

                    </div>

                    <div v-if="item.key == 'payment_failure_url'">

                        <div class="form-group">
                            <label>Payment Failure URL:</label>
                            <input type="text" class="form-control form-control-sm"
                                   v-model="item.value" placeholder="">
                        </div>

                    </div>

                </div>

                <button class="btn btn-primary" v-on:click="store()">Save</button>

            </div>

        </div>



    </div>
</template>
<script src="./GeneralJs.js"></script>