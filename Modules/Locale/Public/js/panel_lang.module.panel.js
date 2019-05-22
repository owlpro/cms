$(document).ready(function () {
    var locales;
    $.ajax({
        type: "GET",
        url: "/api/locale/getLocales",
        success: function (response) {
            locales = response;
        },
        async: false
    });

    function addKeuUpEvent(element){
        $(element).keyup(function () {
            let val = $(this).val();
            val = val.replace(/[^a-zA-Z0-9_.]/ig, '');
            $(this).val(val);
            let input = $(this).parent().parent().find('.uniq_name');
            if (val) {
                input.val("panel." + val);
            } else {
                input.val('');
            }
        });
    }
    $(".uniq_id").keyup(function () {
        addKeuUpEvent($(this));
    });

    $(".newLite").click(function () {
        let len = $('.lang_panel_single').length;
        let data = `<div class="col-12 col-sm-6 col-lg-4 pt-2 pb-3">
                <div class="lang_panel_single">
                    <div class="row">
                        <div class="col-6">
                            <input type="text"
                                   dir="ltr"
                                   name="data[${len}][title]"
                                   class="form-control uniq_id"
                                   value="">
                        </div>
                        <div class="col-6">
                            <input type="text"
                                   dir="ltr"
                                   value=""
                                   class="form-control uniq_name"
                                   readonly>
                        </div>
                    </div>
                    <hr>`;
        locales.forEach(function (item) {
            data += `<div class="row pt-2">
                <div class="col-3 center">${item.title}</div>
                <div class="col-9">
                    <input type="hidden"
                           name="data[${len}][lang][${item.id}][id]"
                           value="NULL">
    
                    <input type="text"
                           dir="${item.direction}"
                           name="data[${len}][lang][${item.id}][text]"
                           class="form-control"
                           value="">
                </div>
            </div>`
        });
        data += `</div>
            </div>`;
        $(".literature_buttons").after(data);
        addKeuUpEvent($(".lang_panel_single:first").find('.uniq_id'));
    });
});