@extends('admin_panel_templates.default.index')

@section('module_assets')
    {{--Use Js And Css Files For All Tabs On This Section--}}
    <link rel="stylesheet" href="{{ module_asset('dashboard','css/dashboard.module.panel.css') }}">
    <script type="text/javascript" src="{{ module_asset('dashboard','js/dashboard.module.panel.js') }}"></script>
    @yield('assets')
@stop

@section('module')
    @yield('content')
@stop
