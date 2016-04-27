<?php
include('../config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');

add_photo();

$page = file_get_contents(PATH_TEMPLATE . 'admin_panel.tpl');
$marker = array('{INFO}', '{PATH_CSS}', '{PATH_JS}', '{INFO_MESSAGE}');
$marker_info = array(get_add_photo_form(), PATH_CSS, PATH_JS, get_info_message($_GET['type_message']) );
$page = str_replace($marker, $marker_info, $page);

echo $page;



?>