@extends('locale::administrator.layout.master')

@section('assets')
    {{-- Custom Js And Css Files For This Tab --}}
    <link rel="stylesheet" href="{{ module_asset('locale','css/locale.module.panel.css') }}">
    <script type="text/javascript" src="{{ module_asset('locale','js/locale.module.panel.js') }}"></script>
@stop

@section('content')
    <form action="{{ route('locale.save') }}" method="post">

        <div class="row mt-2 mb-2">
            <div class="col-12">
                <input type="submit" value="ثبت" class="btn btn-light">
                <input type="button" value="جدید" class="newLocale btn btn-light">
            </div>
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
                        <option value="0" {{ $inactive }}>غیرفعال</option>
                        <option value="1" {{ $active }}>فعال</option>
                    </select>
                </div>
                <div class="col-1">
                    <a href="{{ route('locale.remove',['id' => $locale->id]) }}"
                       class="btn btn-danger"
                       onclick="return confirm('این زبان و تمام ادبیات های آن پاک شود؟')"
                    >حذف</a>
                </div>
            </div>
        @endforeach

    </form>
@stop

