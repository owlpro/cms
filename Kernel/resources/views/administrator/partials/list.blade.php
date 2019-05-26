{{--@php(dd($list))--}}

<div class="panel_list">
    <ul class="panel_right_list">
        @foreach ($list as $item)
            <li class="panel_right_item">
                <a href="{{ $item['url'] }}">
                    <span>{{ panel_lang(config($item['title'].'.trans_name')) }}</span>
                    <i class="{{ config($item['title'].'.icon') }}"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>
