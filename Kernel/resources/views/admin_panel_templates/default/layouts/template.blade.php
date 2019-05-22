<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Default/template</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css?' . time()) }}">

    @if(direction() == 'rtl')
        <link rel="stylesheet" href="{{ asset('css/bootstrap4-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('css/panel.rtl.css?' . time()) }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif


    <script type="text/javascript" src="{{ asset('js/panel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js?' . time()) }}"></script>

    @yield('all_assets')
</head>
<body>
<div class="container-fluid">
    @include('admin_panel_templates.default.partials.top_panel')

    <div class="cms_content">
        <aside class="left">
            @yield('cms_content')
        </aside>

        <aside class="right">
            @yield('module_list')
        </aside>
    </div>
</div>
</body>
</html>