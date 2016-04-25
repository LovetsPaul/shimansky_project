$(document).ready(function() {

    if ($("textarea[name='home_edit_text']").length) { CKEDITOR.replace("home_edit_text"); }
    if ($("textarea[name='about_edit_text']").length) { CKEDITOR.replace("about_edit_text"); }
    if ($("textarea[name='wedding_edit_text']").length) { CKEDITOR.replace("wedding_edit_text"); }
    if ($("textarea[name='corporate_edit_text']").length) { CKEDITOR.replace("corporate_edit_text"); }
    if ($("textarea[name='vipusknoi_edit_text']").length) { CKEDITOR.replace("vipusknoi_edit_text"); }

    setTimeout(function() {
        $(".top_line .info").remove();
    }, 3000);


    $("input[type='checkbox']").change(function() {

        var selector = '';
        var ths = $(this);
        var chbx_attr = ths.attr('id');

        selector = 'label[for=' + '"' + chbx_attr + '"]';
        console.log(selector);

        if (ths.prop('checked')) {



            $(selector).css({
                "color": "red"
            });
        } else {

            $(selector).css({
                "color": ""
            });
        }

    })


});
