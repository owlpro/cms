$(document).ready(function(){
    $(".newLocale").click(function(){
        $num = $('.locale_single').length;
        $new = `<div class="row mb-2 locale_single">
                <input type="hidden" name="data[${$num}][id]" value="new">
                <div class="col-1">
                    <input type="text" class="form-control" dir="ltr" name="data[${$num}][symbol]"
                           value="">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" dir="{{ $locale->direction }}"
                           name="data[${$num}][title]" value="">
                </div>
                <div class="col-1">
                    <select name="data[${$num}][direction]" class="form-control">
                        <option value="rtl">RTL</option>
                        <option value="ltr" selected>LTR</option>
                    </select>
                </div>
                <div class="col-1">
                    <select name="data[${$num}][active]" class="form-control">
                        <option value="0">غیرفعال</option>
                        <option value="1" selected>فعال</option>
                    </select>
                </div>
            </div>`;

        $(".locale_holder").after($new);
    });
});