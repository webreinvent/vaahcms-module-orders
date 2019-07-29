@extends("vaahcms::admin.default.layouts.app")

@section('vaahcms_extend_admin_css')

@endsection


@section('vaahcms_extend_admin_js')
    <script src="{{vh_module_assets_url("Orders", "assets/builds/app.js")}}"></script>
@endsection

@section('content')

    <div id="app">

        <top-menu></top-menu>
        <div class="content-body">
            <router-view></router-view>
        </div>

    </div>

@endsection
