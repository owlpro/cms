@extends('administrator.layouts.template')


@section('all_assets')
    @yield('module_assets')
@stop

@section('cms_content')
    @includeWhen(isset($module),'administrator.partials.modules_tab')
    @yield('module')
@stop

