<?php

include('../config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');

del_posts();
del_post_img();
edit_post();

$page = file_get_contents(PATH_TEMPLATE . 'admin_panel.tpl');
$marker = array('{INFO}', '{NEW_REVIEWS_COUNT}', '{PATH_CSS}', '{PATH_JS}', '{INFO_MESSAGE}');
$marker_info = array(get_edit_post_form(), get_new_reviews_count(), PATH_CSS, PATH_JS, get_info_message($_GET['type_message']) );
$page = str_replace($marker, $marker_info, $page);

echo $page;


?>