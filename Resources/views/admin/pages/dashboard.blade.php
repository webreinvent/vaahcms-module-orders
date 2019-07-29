@extends("vaahcms::admin.default.layouts.dashboard")

@section('vaahcms_extend_admin_css')

@endsection


@section('vaahcms_extend_admin_js')
    <!--<script src="{{vh_module_assets_url("Orders", "assets/js/script.js")}}"></script>-->
@endsection

@section('content')

    <div id="app">

        <!--header-->
        <div class="row">
            <div class="col-sm">
                <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                    <!--title-->
                    <div><h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4></div>
                    <!--/title-->

                    <!--header-actions-->
                    <div class="d-none d-md-block">
                        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    <!--/header-actions-->
                </div>
            </div>
        </div>
        <!--/header-->

        <!--content-->
        <div class="row mg-b-10 mg-t-10">
            <div class="col-sm">
                <p>Your "Orders" module's dashboard is ready!</p>
            </div>
        </div>
        <!--/content-->

    </div>

@endsection
