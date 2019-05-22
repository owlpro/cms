@extends('locale::administrator.layout.master')

@section('assets')
    <link rel="stylesheet" href="{{ module_asset('locale','css/panel_lang.module.panel.css') }}">
    <script type="text/javascript" src="{{ module_asset('locale','js/panel_lang.module.panel.js') }}"></script>
@stop

@section('content')
    <form action="{{ route('locale.panel.save') }}" class="row" method="post">
        @csrf
        <div class="col-12 mt-2 literature_buttons">
            <input type="submit" class="btn btn-light" value="@lang('panel.btn.save')">
            <input type="button" class="btn btn-light newLite" value="@lang('panel.btn.new_item')">
        </div>
        @foreach($literature as $lang)
            <div class="col-12 col-sm-6 col-lg-4 pt-2 pb-3">
                <div class="row">
                    <div class="col-11 pl-0">
                        <div class="lang_panel_single">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text"
                                           dir="ltr"
                                           name="data[{{$loop->index}}][title]"
                                           class="form-control uniq_id"
                                           value="{{ $lang['title'] }}">
                                </div>
                                <div class="col-6">
                                    <input type="text"
                                           dir="ltr"
                                           value="panel.{{$lang['title']}}"
                                           class="form-control uniq_name"
                                           readonly>
                                </div>
                            </div>
                            <hr>
                            @foreach($locales as $locale)
                                <div class="row pt-2 lang">
                                    <div class="col-3 center">{{ $locale->title }}</div>
                                    <div class="col-9">
                                        @php($id = isset($lang['lang'][$locale->id]) ? $lang['lang'][$locale->id]['id'] : '')
                                        @php($text = isset($lang['lang'][$locale->id]) ? $lang['lang'][$locale->id]['text'] : '')
                                        <input type="hidden"
                                               name="data[{{$loop->parent->index}}][lang][{{$locale->id}}][id]"
                                               value="{{ $id }}">

                                        <input type="text"
                                               dir="{{ $locale->direction }}"
                                               name="data[{{$loop->parent->index}}][lang][{{$locale->id}}][text]"
                                               class="form-control"
                                               value="{{ $text }}">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-1 pr-1">
                        <a href="{{ route('locale.panel.remove',['title' => $lang['title']]) }}" class="btn btn-sm btn-danger">🗑</a>
                    </div>
                </div>
            </div>
        @endforeach

    </form>
    <div class="row">
        <div class="col-12">
            {{ $literature->links() }}
        </div>
    </div>

@stop


