@extends('administrator.InternalModules.Locale.layout.master')

@section('assets')
    <link rel="stylesheet" href="{{ internal_module_asset('locale','css/panel_lang.css') }}">
    <script type="text/javascript" src="{{ internal_module_asset('locale','js/panel_lang.js') }}"></script>
@stop

@section('content')
    <form action="{{ route('locale.panel.search') }}" class="row" method="post">
        @csrf
        <div class="col-11">
            <input type="text" name="search" placeholder="جستجوی ادبیات" class="form-control">
        </div>
        <div class="col-1">
            <input type="submit" value="جستجو" class="btn btn-primary">
        </div>
    </form>
    <form action="{{ route('locale.panel.save') }}" class="row" method="post">
        @csrf
        <div class="module_btn">
            <input type="submit" class="btn btn-light" value="@lang('panel.btn.save')">
            <input type="button" class="btn btn-light newLite" value="@lang('panel.btn.new_item')">
        </div>

        @foreach($literature as $lang)
            <div class="col-12 col-sm-6 col-lg-4 pt-3 pb-2">
                <div class="row">
                    <div class="col-12">
                        <div class="lang_panel_single">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <a href="{{ route('locale.panel.remove',['title' => $lang['title']]) }}"
                                       class="btn btn-danger">
                                        <i class="fal fa-trash"></i>
                                    </a>

                                    <button class="btn btn-primary" type="button">
                                        <i class="fal fa-copy"></i>
                                    </button>
                                </div>
                                <div class="col-9 lang_uniq">
                                    <input type="text"
                                           dir="ltr"
                                           name="data[{{$loop->index}}][title]"
                                           class="form-control uniq_id"
                                           value="{{ $lang['title'] }}">
                                    <span>panel.</span>
                                </div>
                            </div>
                            @foreach($locales as $locale)
                                <div class="row pt-2 lang">
                                    <div class="col-3 text-center">{{ $locale->title }}</div>
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

                </div>
            </div>
        @endforeach

    </form>

@stop


