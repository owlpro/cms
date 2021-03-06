@extends('administrator.InternalModules.Locale.layout.master')

@section('assets')
    {{-- Custom Js And Css Files For This Tab --}}
    <link rel="stylesheet" href="{{ internal_module_asset('locale','css/locale.css') }}">
    <script type="text/javascript" src="{{ internal_module_asset('locale','js/locale.js') }}"></script>
@stop

@section('content')
    <form action="{{ route('locale.save') }}" method="post">

        <div class="module_btn">
            <input type="submit" value="@lang('panel.btn.save')" class="btn btn-light">
            <input type="button" value="@lang('panel.btn.new_item')" class="newLocale btn btn-light">
        </div>

        <div class="row text-light">
            <div class="col-1">Symbol</div>
            <div class="col-3">Name</div>
            <div class="col-1">Direction</div>
            <div class="col-1">Active</div>
        </div>
        <div class="locale_holder"></div>
        @csrf
        @foreach($locales as $key => $locale)
            @php
                if($locale->direction == 'rtl'){ $rtl = 'selected'; $ltr=''; }
                else{ $ltr = 'selected'; $rtl=''; }

                if($locale->active){ $active = 'selected'; $inactive=''; }
                else { $inactive = 'selected'; $active=''; }
            @endphp


            <div class="row mb-2 locale_single">
                <input type="hidden" name="data[{{ $key }}][id]" value="{{ $locale->id }}">
                <div class="col-1">
                    <input type="text" class="form-control" dir="ltr" name="data[{{ $key }}][symbol]"
                           value="{{ $locale->symbol }}">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" dir="{{ $locale->direction }}"
                           name="data[{{ $key }}][title]" value="{{ $locale->title }}">
                </div>
                <div class="col-1">
                    <select name="data[{{ $key }}][direction]" class="form-control">
                        <option value="rtl" {{ $rtl }}>RTL</option>
                        <option value="ltr" {{ $ltr }}>LTR</option>
                    </select>
                </div>
                <div class="col-1">
                    <select name="data[{{ $key }}][active]" class="form-control">
                        <option value="0" {{ $inactive }}>@lang('panel.inactive')</option>
                        <option value="1" {{ $active }}>@lang('panel.active')</option>
                    </select>
                </div>
                <div class="col-1">
                    <a href="{{ route('locale.remove',['id' => $locale->id]) }}"
                       class="btn btn-danger"
                       onclick="return confirm('این زبان و تمام ادبیات های آن پاک شود؟')"
                    >@lang('panel.delete')</a>
                </div>
            </div>
        @endforeach

    </form>
@stop

