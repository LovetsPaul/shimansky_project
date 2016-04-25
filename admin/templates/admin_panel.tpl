<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админпанель | shimansky.by</title>
    <link rel="stylesheet" href= "{PATH_CSS}fonts.min.css">
    <link rel="stylesheet" href= "{PATH_CSS}style.css">
</head>
<body>

<div class="top_line">
    <div class="page_name text-left"><a href="/admin/"><span>А</span>дминпанель</a></div>
    <div class="exit text-right">{INFO_MESSAGE}<a href="/admin/includes/exit.php">Выход</a></div>
</div>

<div id="container">
    <div class="left">
        <dl>
            <dt>Главная страница</dt>
            <dd><a href="/admin/action/edit_home.php">Редактировать</a></dd>
        </dl>
        <dl>
            <dt>Кто я такой...</dt>
            <dd><a href="/admin/action/edit_about.php">Редактировать</a></dd>
        </dl>
        <dl>
            <dt>Фотографии</dt>
            <dd><a href="/admin/action/add_photo.php">Добавить</a></dd>
            <dd><a href="/admin/action/del_photo.php">Удалить</a></dd>
            <dd>&nbsp;</dd>
            <dd><a href="/admin/action/del_video.php">Информация о странице (+SEO)</a></dd>
        </dl>
        <dl>
            <dt>Видео</dt>
            <dd><a href="/admin/action/add_video.php">Добавить</a></dd>
            <dd><a href="/admin/action/del_video.php">Удалить</a></dd>
            <dd>&nbsp;</dd>
            <dd><a href="/admin/action/del_video.php">Информация о странице (+SEO)</a></dd>
        </dl>
        <dl>
            <dt>Свадьба</dt>
            <dd><a href="/admin/action/edit_event_wedding.php">Редактировать</a></dd>
        </dl>
        <dl>
            <dt>Корпоративный праздник</dt>
            <dd><a href="/admin/action/edit_event_corporate.php">Редактировать</a></dd>
        </dl>
        <dl>
            <dt>Выпускной</dt>
            <dd><a href="/admin/action/edit_event_vipusknoi.php">Редактировать</a></dd>
        </dl>
        <dl>
            <dt>Блог</dt>
            <dd><a href="/admin/action/add_post.php">Добавить пост</a></dd>
            <dd><a href="/admin/action/edit_posts.php">Редактировать пост(ы)</a></dd>
            <dd><a href="/admin/action/del_posts.php">Удалить пост(ы)</a></dd>
            <dd>&nbsp;</dd>
            <dd><a href="/admin/action/del_video.php">Информация о странице (+SEO)</a></dd>
        </dl>
        <dl>
            <dt>Отзывы</dt>
            <dd><a href="/admin/action/edit_reviews.php">Редактировать</a></dd>
            <dd><a href="/admin/action/new_reviews.php">Новые отзывы ({NEW_REVIWES_COUNT})</a></dd>
            <dd><a href="/admin/action/del_reviews.php">Удалить отзыв(ы)</a></dd>
            <dd>&nbsp;</dd>
            <dd><a href="/admin/action/del_video.php">Информация о странице (+SEO)</a></dd>
        </dl>
        <dl>
            <dt>Контакты</dt>
            <dd><a href="/admin/action/edit_contacts.php">Редактировать</a></dd>
        </dl>
    </div>
    
    <div class="right">

        <form method="post" action="" enctype="multipart/form-data">
            <table id="edit_form">
                {INFO}
            </table>
        </form>
    </div>
</div>

<script src="{PATH_JS}jquery.min.js"></script>

<script src="{PATH_JS}ckeditor/ckeditor.js"></script>
<script>CKEDITOR.dtd.$removeEmpty['span'] = false;</script>
<script src="{PATH_JS}common.js"></script>
</body>
</html>