<?php
include('config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');
session_start();
$page = file_get_contents(PATH_TEMPLATE . 'admin_panel.tpl');
$marker = array('{INFO}', '{NEW_REVIEWS_COUNT}', '{PATH_CSS}', '{PATH_JS}', '{INFO_MESSAGE}');
$marker_info = array('Выберите действие...', get_new_reviews_count(), PATH_CSS, PATH_JS, '<a href="/" target="_blank">Перейти на сайт</a>&nbsp;&nbsp;/&nbsp;&nbsp;' );
$page = str_replace($marker, $marker_info, $page);

echo $page;


?>