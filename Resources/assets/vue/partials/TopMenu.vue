<template>


    <div >

        <!--app nav-->
        <nav class="navbar navbar-expand-lg navbar-app navbar-light">

            <a class="navbar-brand tx-bold tx-spacing--2" href="#">Orders</a>

            <button class="navbar-toggler order-2" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i data-feather="menu" class="wd-20 ht-20"></i>
            </button>

            <div class="collapse navbar-collapse order-2 " id="navbarNav">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ path: '/'}">
                            Dashboard
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link"
                                     :class="{'active': $route.matched[0].path == '/orders'}"
                                     :to="{ path: '/orders'}">
                            Orders
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ path: '/payments'}">
                            Payments
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ path: '/invoices'}">
                            Invoices
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link"
                                     :class="{'active': $route.matched[0].path == '/settings'}"
                                     :to="{ path: '/settings/general'}" exact>
                            Settings
                        </router-link>
                    </li>


                </ul>



            </div>
        </nav>
        <!--/app nav-->


    </div>


</template>
<script src="./TopMenuJs.js"></script>