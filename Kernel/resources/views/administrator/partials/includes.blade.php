
<link rel="stylesheet" href="{{ asset('packages/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('packages/pace/themes/blue/pace-theme-minimal.css') }}">
<link rel="stylesheet" href="{{ asset('packages/simplebar/src/simplebar.css') }}">

<link rel="stylesheet" href="{{ asset('css/panel.css?' . time()) }}">

@if(direction() == 'rtl')
    <link rel="stylesheet" href="{{ asset('packages/bootstrap/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.rtl.css?' . time()) }}">
@else
    <link rel="stylesheet" href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}">
@endif


<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('packages/pace/pace.min.js') }}"></script>
<script src="{{ asset('packages/simplebar/src/simplebar.js') }}"></script>
<script src="{{ asset('js/panel.js?' . time()) }}"></script>
