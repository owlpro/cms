<ul class="modules">
    <li class="module">
        <a href="{{ url(env('ADMINISTRATOR_PANEL_URL','panel')) }}">داشبورد</a>
    </li>
    @foreach ($modules as $module)
        <li class="module">
            <a href="{{url(env('ADMINISTRATOR_PANEL_URL','panel') .'/'. strtolower($module))}}">{{ panel_lang(config(strtolower($module).".trans_name")) }}</a>
        </li>
    @endforeach
</ul>
