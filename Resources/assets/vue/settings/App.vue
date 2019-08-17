<template>

    <div class="row no-gutters mg-t-1  app-component">



            <div class="col-xs-4 col-md-3 col-lg-2 ht-100v-app" style="background-color: #fff">

                <div class="form-group mg-b-10" >

                    <input type="text" class="form-control form-control-search" placeholder="Search Settings" >

                </div>

                <div class="pd-x-10">

                <ul class="nav flex-column" v-if="list">

                    <li class="nav-item" v-for="item in list">

                        <router-link class="nav-link"
                                     v-if="item.slug=='general'"
                                     :class="{'active': $route.matched[0].path == '/settings/general'}"
                                     :to="{ path: '/settings/'+item.slug}" exact>
                            {{item.name}}
                        </router-link>

                        <router-link class="nav-link"
                                     v-else
                                     :to="{ path: '/settings/'+item.slug}">
                            {{item.name}}
                        </router-link>

                    </li>

                </ul>
                </div>

            </div>
            <div class="col-xs-8 col-md-9 col-lg-10 ht-100v-app bd-l bd-gray-200">
                <div class="pd-x-15">
                <router-view></router-view>
                </div>
            </div>





    </div>


</template>
<script src="./AppJs.js"></script>