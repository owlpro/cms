<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Default/template</title>
    @include('admin_panel_templates.default.partials.includes')

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