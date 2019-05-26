@if($languages->count() > 1 )
    @foreach($languages as $lang)
        @if(app()->getLocale() != Str::lower($lang->symbol))
            <a href="{{ route('changeLocale',['locale' => $lang->symbol]) }}">{{ $lang->title }}</a>
        @endif
    @endforeach
@endif