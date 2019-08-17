<template>
    <div class="col-sm-8">

        <div class="card">

            <!--header-->
            <div class="card-header">

                <div class="d-sm-flex align-items-center justify-content-between">
                    <div>
                        <h5>Orders #003</h5>
                    </div>
                    <div class="d-none d-md-block">

                        <router-link class="btn btn-card "
                                     :to="{ path: '/orders'}">
                            <i class="fas fa-times"></i>
                        </router-link>

                    </div>
                </div>

            </div>
            <!--/header-->

            <!--body-->
            <div class="card-body">

                <div class="order-details">

                    <div class="d-flex align-items-center justify-content-between mg-b-25">
                        <h6 class="mg-b-0">Personal Details</h6>
                        <div class="d-flex">
                            <a href="#modalEditContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center mg-r-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg><span class="d-none d-sm-inline mg-l-5"> Edit</span></a>
                            <a href="#modalDeleteContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg><span class="d-none d-sm-inline mg-l-5"> Delete</span></a>
                        </div>
                    </div>

                    <h6 class="mg-t-40 mg-b-20">Contact Details</h6>

                    <div class="row row-sm">
                        <div class="col-6 col-sm-4">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Mobile Phone</label>
                            <p class="tx-primary tx-rubik mg-b-0">+1 290 912 3868</p>
                        </div>
                        <div class="col-6 col-sm-4">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Home Phone</label>
                            <p class="tx-primary tx-rubik mg-b-0">+1 011 342 3129</p>
                        </div>
                        <div class="col-6 col-sm-4 mg-t-20 mg-sm-t-0">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Work Phone</label>
                            <p class="tx-primary tx-rubik mg-b-0">+1 100 003 3344</p>
                        </div>
                        <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Email Address</label>
                            <p class="tx-primary mg-b-0">me@themepixels.me</p>
                        </div>
                        <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Company</label>
                            <p class="mg-b-0">ThemePixels, Inc.</p>
                        </div>
                        <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Job Position</label>
                            <p class="mg-b-0">President &amp; CEO</p>
                        </div>
                        <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Home Address</label>
                            <p class="mg-b-0">4658 Kenwood Place<br>Pompano Beach, FL 33060, United States</p>
                        </div>
                        <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Work Address</label>
                            <p class="mg-b-0">819 Waldeck Street<br>Farmers Branch, TX 75244, United States</p>
                        </div>
                        <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Personal Website</label>
                            <p class="tx-primary mg-b-0">http://themepixels.me/</p>
                        </div>
                        <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Social Profiles</label>
                            <nav class="nav nav-social">
                                <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a>
                                <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a>
                                <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line></svg></a>
                                <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a>
                            </nav>
                        </div><!-- col -->
                        <div class="col-sm mg-t-20 mg-sm-t-30">
                            <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Notes</label>
                            <p class="tx-13 mg-b-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                        </div>
                    </div>

                </div>

                <!--history-->
                <div class="divider-text mg-b-5">History</div>
                <div class="history-log">
                    <ul >
                        <li>
                            <a href="#">Seetha Janakiraman</a> changed the name to "Change Stripe Fee to to 3%".
                            <span class="tx-date">Feb 28</span>
                        </li>
                        <li>
                            <a href="#">Seetha Janakiraman</a> changed the description.
                            <span class="tx-date">Feb 28</span>
                        </li>

                        <li>
                            <a href="#">Seetha Janakiraman</a> changed Priority to "High".
                            <span class="tx-date">Feb 28</span>
                        </li>

                    </ul>
                </div>
                <!--/history-->

            </div>
            <!--/body-->



        </div>

    </div>
</template>
<script src="./ViewJs.js"></script>