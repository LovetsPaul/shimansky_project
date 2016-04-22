<?php
include('config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');

$page = file_get_contents(PATH_TEMPLATE . 'admin_panel.tpl');
$marker = array('{INFO}', '{PATH_CSS}', '{PATH_JS}');
$marker_info = array('Выберите действие...', PATH_CSS, PATH_JS );
$page = str_replace($marker, $marker_info, $page);

echo $page;


?>