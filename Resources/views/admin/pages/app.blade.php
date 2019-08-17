@extends("vaahcms::admin.default.layouts.app")

@section('vaahcms_extend_admin_css')
    <link href="{{vh_module_assets_url("Orders", "assets/css/style.css")}}" rel="stylesheet" media="screen">
@endsection


@section('vaahcms_extend_admin_js')
    <script src="{{vh_module_assets_url("Orders", "assets/builds/app.js")}}"></script>
@endsection

@section('content')

    <div id="app">

        <top-menu></top-menu>

         <router-view></router-view>


    </div>

@endsection
