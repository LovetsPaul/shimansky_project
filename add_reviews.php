<?php
include('config.php');
include(PATH_INCLUDES . 'connect.php');

function my_string($str1){

	$str = $str1;
	$str = trim($str);
	$str = stripslashes($str);
	$str = htmlspecialchars($str, ENT_QUOTES);
	$str = nl2br($str);
	return $str;
}

if( isset($_POST['your_name']) or isset($_POST['your_email']) or isset($_POST['your_text']) ){

	$name = my_string( $_POST['your_name'] );
	$email = my_string( $_POST['your_email'] );
	$text = my_string( $_POST['your_text'] );
	$img = isset($_FILES['add_img']['name']) ? $_FILES['add_img']['name'] : '';
	$sql = "";

	if( isset($_FILES['add_img']['name']) ){

		$sql = "INSERT INTO `reviews` (`id`, `review_img`, `review_name`, `review_text`, `review_date`, `review_email`, `visible`) VALUES 

		(NULL, '$img', '$name', '$text', CURRENT_TIMESTAMP, '$email', '0')";

		

	}else{

		$sql = "INSERT INTO `reviews` (`id`, `review_name`, `review_text`, `review_date`, `review_email`, `visible`) VALUES 

		(NULL, '$name', '$text', CURRENT_TIMESTAMP, '$email', '0')";

	}

	mysql_query($sql);
}


		if($_FILES['add_img']['size'] > 1024*3*1024)
	   {
		 echo ("Размер файла превышает три мегабайта");
		 exit;
	   }
	   
	   if(is_uploaded_file($_FILES['add_img']['tmp_name']))
	   {
	   
		 move_uploaded_file($_FILES['add_img']['tmp_name'], PATH_UPLOADS . $_FILES['add_img']['name']);
		 
	   }		   
		   
		if($query){
			echo " Ваша новость успешно добавлена!";
		}

?>