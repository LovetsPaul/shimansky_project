$(document).ready(function() {

    if ($("textarea[name='home_edit_text']").length) { CKEDITOR.replace("home_edit_text"); }
    if ($("textarea[name='about_edit_text']").length) { CKEDITOR.replace("about_edit_text"); }
    if ($("textarea[name='wedding_edit_text']").length) { CKEDITOR.replace("wedding_edit_text"); }
    if ($("textarea[name='corporate_edit_text']").length) { CKEDITOR.replace("corporate_edit_text"); }
    if ($("textarea[name='vipusknoi_edit_text']").length) { CKEDITOR.replace("vipusknoi_edit_text"); }
    if ($("textarea[name='full_text_post']").length) { CKEDITOR.replace("full_text_post"); }
    if ($("textarea[name='post_edit_text']").length) { CKEDITOR.replace("post_edit_text"); }


    if (typeof($(".top_line .info").html()) != 'undefined') {

        setTimeout(function() {
            $(".top_line .info").remove()
        }, 3000);


        setTimeout(function() {
            $(".exit").prepend('<a href="/" target="_blank">Перейти на сайт</a>&nbsp;&nbsp;/&nbsp;&nbsp;');
            $(".exit").children('a[href="/"]').hide().delay(300).show();
        }, 3000);
    }

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

    });

    $('#add_photo_input').bind('change', function() {

        var f = this.files[0],
            size = f.size || f.fileSize,
            type = ((f.type).substr(6)).toString(),
            ext = ['jpg', 'jpeg', 'png', 'gif'];
        found = false;
        if (size > 300000) {

            $(this).val('');
            $(this).remove();
            alert("Размер файла превышает 200kb!");
            $("#file_container").append('<input type="file" name="add_photo_input" id="add_photo_input">');
            return false;
        }

        ext.forEach(function(extention) {
            if (type == extention) found = true;
        });

        if (!found) {
            $(this).val('');
            $(this).remove();
            alert("Недопустимый формат изображения!\n\n Доступные форматы для загрузки:  jpg, jpeg, png, gif");

            $("#file_container").append('<input type="file" name="add_photo_input" id="add_photo_input">');
        }
    });

    $('#add_photo_post').bind('change', function() {

        var f = this.files[0],
            size = f.size || f.fileSize,
            type = ((f.type).substr(6)).toString(),
            ext = ['jpg', 'jpeg', 'png', 'gif'];
        found = false;
        if (size > 300000) {

            $(this).val('');
            $(this).remove();
            alert("Размер файла превышает 200 кБ!");
            $("#file_container").append('<input type="file" name="add_photo_post" id="add_photo_post">');
            return false;
        }

        ext.forEach(function(extention) {
            if (type == extention) found = true;
        });

        if (!found) {
            $(this).val('');
            $(this).remove();
            alert("Недопустимый формат изображения!\n\n Доступные форматы для загрузки:  jpg, jpeg, png, gif");

            $("#file_container").append('<input type="file" name="add_photo_post" id="add_photo_post">');
        }
    });



});
