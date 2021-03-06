@extends('administrator.index')

@section('module_assets')
    {{--Use Js And Css Files For All Tabs On This Section--}}
    <link rel="stylesheet" href="{{ module_asset('users','css/users.module.panel.css') }}">
    <script type="text/javascript" src="{{ module_asset('users','js/users.module.panel.js') }}"></script>

    @yield('assets')
@stop

@section('module')
    @yield('content')
@stop
