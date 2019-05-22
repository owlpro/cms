<script>
    var segment = '{{ Request()->segment(3) }}' ;
    $(window).on('load',function(){
        if(segment){
            $('.nav-item > .nav-link[segment='+segment+']').addClass('active');
        } else {
            $('.nav-item > .nav-link:first').addClass('active');
        }
    });
</script>



<ul class="nav nav-tabs">
    @foreach(config($name.'.tabs') as $segment => $tab)
        <li class="nav-item">
            <a class="nav-link pr-2 pl-2" segment="{{$segment}}"
               href="{{ url(env('ADMINISTRATOR_PANEL_URL').'/'.$name) . '/' . $segment }}">{{ panel_lang($tab) }}</a>
        </li>
    @endforeach
</ul>
