<link rel="stylesheet" href="{{ asset('css/panel.css?' . time()) }}">

@if(direction() == 'rtl')
    <link rel="stylesheet" href="{{ asset('packages/bootstrap/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.rtl.css?' . time()) }}">
@else
    <link rel="stylesheet" href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}">
@endif
<link rel="stylesheet" href="{{ asset('packages/fontawesome/css/all.min.css') }}">


<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/panel.js?' . time()) }}"></script>
