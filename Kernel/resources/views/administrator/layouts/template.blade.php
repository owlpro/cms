<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head >
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator</title>
    @include('administrator.partials.includes')

    @yield('all_assets')
</head>
<body data-simplebar>

<div class="container-fluid main_container">

    @include('administrator.partials.top_panel')
    @includeWhen($list,'administrator.partials.list')
    <div class="cms_content">
        @yield('cms_content')
    </div>
</div>
</body>
</html>