<?php
include('../config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');


if( isset($_POST['your_name']) or isset($_POST['your_email']) or isset($_POST['your_text']) ){

	$name = mysql_escape_string( my_string( $_POST['your_name'] ) );
	$email = mysql_escape_string( my_string( $_POST['your_email'] ) );
	$text = mysql_escape_string( my_string( $_POST['your_text'] ) );
	$img_name = (isset( $_FILES['add_img']['name'] ) && $_FILES['add_img']['name']!='') ? $_FILES['add_img']['name'] = md5(time()) : '';
	$img_full_name = ($img_name != '') ?  $img_name .'.'. substr( $_FILES['add_img']['type'], 6 ) : '';
	$sql = "";

	$file_ext = substr( $_FILES['add_img']['type'], 6 );
	

	$acces_ext = array('jpg', 'jpeg', 'png', 'gif');

	$is_ok_ext = false;
	foreach($acces_ext as $ext){

		if( $file_ext != $ext){
			$is_ok_ext = $is_ok_ext;
		}else{
			$is_ok_ext = true;
		}

	}
	if(!$is_ok_ext){
		$img_full_name = '';
	}

	if( !empty($_FILES['add_img']['name']) ){

		$sql = "INSERT INTO `reviews` (`id`, `review_img`, `review_name`, `review_text`, `review_date`, `review_email`, `visible`) VALUES 

		(NULL, '$img_full_name', '$name', '$text', CURRENT_TIMESTAMP, '$email', '0')";

		

	}else{

		$sql = "INSERT INTO `reviews` (`id`, `review_name`, `review_text`, `review_date`, `review_email`, `visible`) VALUES 

		(NULL, '$name', '$text', CURRENT_TIMESTAMP, '$email', '0')";

	}

	mysql_query($sql);
}

	
	cwUpload("add_img" , PATH_UPLOADS, $img_full_name, true, PATH_THUMB, 690, 420);


?>