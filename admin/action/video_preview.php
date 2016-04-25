<?php
include('../config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');

del_video();
$page = file_get_contents(PATH_TEMPLATE . 'video_preview.tpl');
$marker = array('{VIDEO_URL}', '{PATH_CSS}');
$marker_info = array( video_preview(), PATH_CSS );
$page = str_replace($marker, $marker_info, $page);

echo $page;



?>