<template>

    <div>

        <div class="content-body">


            <div class="row">
                <div class="col-sm mg-b-10">
                    <view-md v-if="$route.matched.length == 1"></view-md>
                    <view-sm v-else></view-sm>
                </div>

                <router-view></router-view>

            </div>


        </div>

    </div>
</template>
<script src="./AppJs.js"></script>