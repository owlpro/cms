@extends('admin_panel_templates.default.index')

@section('module_assets')
    {{--Use Js And Css Files For All Tabs On This Section--}}

    @yield('assets')
@stop

@section('module')
    <div class="pt-2">
        @yield('content')
    </div>
@stop
