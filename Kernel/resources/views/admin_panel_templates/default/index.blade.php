@extends('admin_panel_templates.default.layouts.template')


@section('all_assets')
    @yield('module_assets')
@stop

@section('cms_content')
    @includeWhen(isset($current_module),'admin_panel_templates.default.partials.modules_tab')
    @yield('module')
@stop

@section('module_list')
    @includeWhen($modules,'admin_panel_templates.default.partials.modules_list')
@stop
