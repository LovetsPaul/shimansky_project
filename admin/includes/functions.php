<?php
	
	function my_string($str1){

		$str = $str1;
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str, ENT_QUOTES);
		$str = nl2br($str);

		return $str;
	}

	function img_upload($field_name = '', $target_folder = '', $file_name = ''){

		//folder path setup
		$target_path = $target_folder;
		
		//file name setup
		$filename_err = explode(".",$_FILES[$field_name]['name']);
		$filename_err_count = count($filename_err);
		$file_ext = substr($_FILES[$field_name]['type'], 6);

		if($file_name != ''){
			$fileName = $file_name;
		}else{
			$fileName = md5(time());
			$fileName = $fileName .".". $file_ext;
		}
		//upload image path
		$upload_image = $target_path.basename($fileName);

		$acces_ext = array('jpg', 'jpeg', 'png', 'gif');
		$is_ok_ext = false;

		foreach($acces_ext as $ext=>$val){
			($file_ext != $val) ? $is_ok_ext = false : $is_ok_ext = true;
			if($is_ok_ext)
				break;
		}

		
		if($is_ok_ext){

			//upload image
			if( ($_FILES[$field_name]['size'] < 2000000) ){

				if(move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_image) ){
					return $fileName;
				}else{
					return false;
				}

			}else{
				$_GET['type_message'] = 7;
				return false;
			}

		}else{
			$_GET['type_message'] = 8;
			return false;
		}
		
	}

	function get_info_message($par){
		
		$par = (int)$par;
		$message_tpl = '';

		if( isset($_GET['type_message']) ){

			if( $par ==	1 ){
				$message_tpl = file_get_contents(PATH_TEMPLATE . "message_ok.tpl");
				return $message_tpl;
			}else if( $par == 2 ){
				$message_tpl = file_get_contents(PATH_TEMPLATE . "message_error.tpl");
				return $message_tpl;
			}else if( $par == 3 ){
				$message_tpl = "Не выбраны файлы для удаления&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 4 ){
				$message_tpl = "Нет данных!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 5 ){
				$message_tpl = "Файл не загружен!!!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 6 ){
				$message_tpl = "Файл успешно загружен!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 7 ){
				$message_tpl = "Файл не должен превышать 2Мб!!!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 8 ){
				$message_tpl = "Недопустимый формат изображения!!!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 9 ){
				$message_tpl = "Отзыв успешно удалён!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 10 ){
				$message_tpl = "Изображение удалено!&nbsp;&nbsp;";
				return $message_tpl;
			}else if( $par == 11 ){
				$message_tpl = "Новость успешно добавлена!&nbsp;&nbsp;";
				return $message_tpl;
			}else{

			return '<a href="/" target="_blank">Перейти на сайт</a>&nbsp;&nbsp;/&nbsp;&nbsp;';			}

		}else{
			return '<a href="/" target="_blank">Перейти на сайт</a>&nbsp;&nbsp;/&nbsp;&nbsp;';
		}
			
	}

	function get_home_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 1";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template     = file_get_contents(PATH_TEMPLATE . 'home_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );

		$str = str_replace( $marker, $marker_info, $template );

		return $str;
	}

	function get_new_reviews_count(){

		$sql     = "SELECT `id` FROM `bd_shimansky`.`reviews` WHERE `viewed` = 0";
		$data    = mysql_query($sql);
		$r_count = mysql_affected_rows();

		if($r_count != 0){
			$r_count = '(<span id="r_count">+' . $r_count . '</span>)';
		}else{
			$r_count = '<strong style="font-size: 12px; ">(нет новых)</strong>';
		}

		return $r_count;
	}

	function reset_new_reviews_count(){
		$sql = "UPDATE  `bd_shimansky`.`reviews` SET `viewed` = 1 WHERE `viewed` = 0";
		@mysql_query($sql);
	}

	

	function edit_home_content(){

		if( isset($_POST['enter']) ){

			$title    = isset($_POST['home_title']) ? $_POST['home_title'] : '' ;
			$descr    = isset($_POST['home_descr']) ? $_POST['home_descr'] :  '' ;
			$text     = isset($_POST['home_edit_text']) ? $_POST['home_edit_text'] :  '' ;
			$keywords = isset($_POST['home_keywords']) ? $_POST['home_keywords'] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$text     = mysql_escape_string($text);
			$keywords = mysql_escape_string($keywords);

			if(strlen($text)>0 && strlen($title)>0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `page_content`='$text', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = 1";
				mysql_query($sql);

				$_GET['type_message'] = 1;

			}else{
				$_GET['type_message'] = 2;
				return false;
			}
		}
	}

	function get_about_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 2";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template     = file_get_contents(PATH_TEMPLATE . 'about_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $template );

		return $str;
	}

	function edit_about_content(){

		if( isset($_POST['enter_about']) ){

			$title 	  = isset($_POST['about_title']) ? $_POST['about_title'] : '' ;
			$descr    = isset($_POST['about_descr']) ? $_POST['about_descr'] :  '' ;
			$text     = isset($_POST['about_edit_text']) ? $_POST['about_edit_text'] :  '' ;
			$keywords = isset($_POST['about_keywords']) ? $_POST['about_keywords'] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$text     = mysql_escape_string($text);
			$keywords = mysql_escape_string($keywords);

			if(strlen($text)>0 && strlen($title)>0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `page_content`='$text', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = 2";
				mysql_query($sql);

				$_GET['type_message'] = 1;


			}else{
				$_GET['type_message'] = 2;
			}
		}

		
	}

	function get_wedding_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 7";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template     = file_get_contents(PATH_TEMPLATE . 'wedding_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $template );

		return $str;
	}

	function edit_wedding_content(){
		
		if( isset($_POST['enter_wedding']) ){

			$title 	  = isset($_POST['wedding_title']) ? $_POST['wedding_title'] : '' ;
			$descr    = isset($_POST['wedding_descr']) ? $_POST['wedding_descr'] :  '' ;
			$text     = isset($_POST['wedding_edit_text']) ? $_POST['wedding_edit_text'] :  '' ;
			$keywords = isset($_POST['wedding_keywords']) ? $_POST['wedding_keywords'] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$text     = mysql_escape_string($text);
			$keywords = mysql_escape_string($keywords);

			if(strlen($text)>0 && strlen($title)>0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `page_content`='$text', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = 7";
				mysql_query($sql);

				$_GET['type_message'] = 1;


			}else{
				$_GET['type_message'] = 2;
				return false;
			}
		}

		
	}

	function get_corporate_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 8";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template    = file_get_contents(PATH_TEMPLATE . 'corporate_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $template );

		return $str;
	}

	function edit_corporate_content(){
		
		if( isset($_POST['enter_corporate']) ){

			$title 	  = isset($_POST['corporate_title']) ? $_POST['corporate_title'] : '' ;
			$descr    = isset($_POST['corporate_descr']) ? $_POST['corporate_descr'] :  '' ;
			$text     = isset($_POST['corporate_edit_text']) ? $_POST['corporate_edit_text'] :  '' ;
			$keywords = isset($_POST['corporate_keywords']) ? $_POST['corporate_keywords'] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$text     = mysql_escape_string($text);
			$keywords = mysql_escape_string($keywords);

			if(strlen($text)>0 && strlen($title)>0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `page_content`='$text', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = 8";
				mysql_query($sql);

				$_GET['type_message'] = 1;


			}else{
				$_GET['type_message'] = 2;
			}
		}

		
	}

	function get_vipusknoi_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 9";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template    = file_get_contents(PATH_TEMPLATE . 'vipusknoi_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $template );

		return $str;
	}

	function edit_vipusknoi_content(){
		
		if( isset($_POST['enter_vipusknoi']) ){

			$title 	  = isset($_POST['vipusknoi_title']) ? $_POST['vipusknoi_title'] : '' ;
			$descr    = isset($_POST['vipusknoi_descr']) ? $_POST['vipusknoi_descr'] :  '' ;
			$text     = isset($_POST['vipusknoi_edit_text']) ? $_POST['vipusknoi_edit_text'] :  '' ;
			$keywords = isset($_POST['vipusknoi_keywords']) ? $_POST['vipusknoi_keywords'] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$text     = mysql_escape_string($text);
			$keywords = mysql_escape_string($keywords);

			if(strlen($text)>0 && strlen($title)>0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `page_content`='$text', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = 9";
				mysql_query($sql);

				$_GET['type_message'] = 1;


			}else{
				$_GET['type_message'] = 2;
			}
		}

	}

	function edit_contacts(){

		if( isset($_POST['enter_contacts']) ){

			$title    = isset($_POST['contacts_title']) ? $_POST['contacts_title'] : '' ;
			$phone    = isset($_POST['contacts_phone']) ? $_POST['contacts_phone'] :  '' ;
			$email    = isset($_POST['contacts_email']) ? $_POST['contacts_email'] :  '' ;
			$vk       = isset($_POST['contacts_vkontakte']) ? $_POST['contacts_vkontakte'] :  '' ;
			$inst     = isset($_POST['contacts_instagram']) ? $_POST['contacts_instagram'] :  '' ;
			$fb       = isset($_POST['contacts_facebook']) ? $_POST['contacts_facebook'] :  '' ;
			$keywords = isset($_POST['contacts_keywords']) ? $_POST['contacts_keywords'] :  '' ;
			$descr    = isset($_POST['contacts_descr']) ? $_POST['contacts_descr'] :  '' ;

			$title    = mysql_escape_string($title);
			$phone    = mysql_escape_string($phone);
			$email    = mysql_escape_string($email);
			$vk       = mysql_escape_string($vk);
			$inst     = mysql_escape_string($inst);
			$fb       = mysql_escape_string($fb);
			$keywords = mysql_escape_string($keywords);
			$descr    = mysql_escape_string($descr);

			if(strlen($title)>0 && strlen($email)>0 && strlen($phone)>0){

				$sql = "UPDATE  `bd_shimansky`.`social`, `bd_shimansky`.`pages` SET `pages`.`page_title`='$title', `pages`.`description`='$descr', `pages`.`keywords`='$keywords', 
				`social`.`e-mail`='$email', `social`.`phone`='$phone', `social`.`vkontakte`='$vk', `social`.`facebook`='$fb', `social`.`instagramm`='$inst' 
				WHERE  `pages`.`id_page` = 6";
				mysql_query($sql);

				$_GET['type_message'] = 1;

			}else{
				$_GET['type_message'] = 2;
			}
		}
	}

	function get_contacts_form(){

		$sql = "SELECT `pages`.`page_title`, `social`.`phone`, `social`.`e-mail`, `social`.`vkontakte`, `social`.`facebook`, `social`.`instagramm`, `pages`.`keywords`, `pages`.`description` 
		FROM `social`, `pages` WHERE `pages`.`id_page` = 6";

		$marker      = array('{TITLE_VALUE}', '{PHONE}', '{EMAIL}', '{VKONTAKTE}', '{FACEBOOK}', '{INSTAGRAM}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template    = file_get_contents(PATH_TEMPLATE . 'contacts_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] , $inf[4] , $inf[5] , $inf[6], $inf[7] );
		$str         = str_replace( $marker, $marker_info, $template );

		return $str;
	}


	function add_video(){

		if( isset($_POST['enter_video']) ){

			$url      = isset($_POST['video_url']) ? $_POST['video_url'] :  '' ;
			$v_descr  = isset($_POST['v_descr']) ? $_POST['v_descr'] :  '' ;

			$url      = mysql_escape_string($url);
			$v_descr  = mysql_escape_string($v_descr);

			if(strlen($url)>0 && strlen($v_descr)>0){

				$sql = "INSERT INTO `bd_shimansky`.`video` (`video`.`id`, `video`.`video_src`, `video`.`description`) VALUES (NULL, '$url', '$v_descr')";
				mysql_query($sql);

				$_GET['type_message'] = 1;

			}else{
				$_GET['type_message'] = 2;
			}
		}
	}

	function get_add_video_form(){

		$template = file_get_contents(PATH_TEMPLATE . 'add_video_form.tpl');

		return $template;
	}

	function del_video(){

		if( isset($_POST['enter_del_video']) && isset($_POST['video_chbx'])  && !isset($_GET['id_del_video']) ){

			$id_array = array();

			$list = $_POST['video_chbx'];

			foreach($list as $id){

				if( (int)$id ){
					$id_array[] = $id;
				}

			}

			$results = implode(',', $id_array);

			$sql = "DELETE FROM `bd_shimansky`.`video` WHERE `id` IN (" . $results .")";

			if(mysql_query($sql)){
				$_GET['type_message'] = 1;
			}

		}else if(isset($_POST['enter_del_video']) && !isset($_POST['video_chbx']) && !isset($_GET['id_del_video']) ){
			$_GET['type_message'] = 3;
		}else if(isset($_POST['enter_del_video']) && !empty($_GET['id_del_video'])){

			$id = (int) $_GET['id_del_video'];
			$sql = "DELETE FROM `bd_shimansky`.`video` WHERE `id` = '$id'";

			if(mysql_query($sql)){
				$_GET['type_message'] = 1;
				header("Location: /admin/action/del_video.php?type_message=1");
			}
		}
	}

	function get_del_video_form(){

		$sql   = "SELECT `id`, `description`, `video_src` FROM `bd_shimansky`.`video` ORDER BY `id` DESC";
		$data  = mysql_query( $sql );
		$count = mysql_affected_rows();

		$template       = file_get_contents(PATH_TEMPLATE . 'del_video_form.tpl');
		$template_child = file_get_contents(PATH_TEMPLATE . 'del_video_item_form.tpl');
		$marker         = array('{VIDEO_ITEM_FOR_DEL}');
		$marker_child   = array( '{ID_VIDEO}', '{VIDEO_NAME}', '{VIDEO_URL}' );
		$str = '';
		if($count == 0){
			$_GET['type_message'] = 4;
		}
		for( $i=0; $i<$count; $i++ ){

			$inf         = mysql_fetch_array( $data );
			$marker_info = array( $inf[0], $inf[1], $inf[2]);
			$str        .= str_replace($marker_child, $marker_info, $template_child);
			
		}

		$str = str_replace($marker, $str, $template);
		return  $str;
	}

	function video_preview(){

		$id = $_GET['id_del_video'];

		$sql       = "SELECT `video_src` FROM `bd_shimansky`.`video` WHERE `id` = '$id'";
		$data      = mysql_query($sql);
		$inf       = mysql_fetch_array($data);
		$video_url = $inf[0];

		return $video_url;
	}

	function del_photo(){

		if( isset($_POST['enter_del_photo']) && isset($_POST['photo_chbx']) ){

			$id_array = array();

			$list = $_POST['photo_chbx'];

			foreach($list as $id){

				if( (int)$id ){
					$id_array[] = $id;
				}

			}

			$results = implode(',', $id_array);

			$sql = "DELETE FROM `bd_shimansky`.`photo` WHERE `id` IN (" . $results .")";

			//delete_file_data///
			$sql_del   = "SELECT `photo_img` FROM `bd_shimansky`.`photo` WHERE `id` IN (" . $results .")";
			$data_del  = mysql_query($sql_del);
			$count_del = mysql_affected_rows();
		
			if(mysql_query($sql)){
				//delete_file//
				for($i=0; $i<$count_del; $i++){
					$inf_del   = mysql_fetch_array($data_del);
					$file_name = PATH_UPLOADS . basename($inf_del[0]);
			        if(file_exists($file_name)) {
			            unlink($file_name);

			        }
				}
		       
				$_GET['type_message'] = 1; //it`s OK//
			}

		}else if(isset($_POST['enter_del_photo']) && !isset($_POST['photo_chbx']) && !isset($_GET['id_del_photo']) ){
			$_GET['type_message'] = 3; //empty data//
		}

	}

	function get_del_photo_form(){

		$sql   = "SELECT `id`, `photo_img` FROM `bd_shimansky`.`photo` ORDER BY `photo_add_time` DESC";
		$data  = mysql_query( $sql );
		$count = mysql_affected_rows();

		$template       = file_get_contents(PATH_TEMPLATE . 'del_photo_form.tpl');
		$template_child = file_get_contents(PATH_TEMPLATE . 'del_photo_item_form.tpl');
		$marker         = array('{PHOTO_ITEM_FOR_DELETE}');
		$marker_child   = array( '{PATH_UPLOADS_IMG}', '{ID_PHOTO}', '{PHOTO_SRC}' );
		$str = '';

		if($count == 0){
			$_GET['type_message'] = 4;
		}
		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			$marker_info = array( PATH_UPLOADS_IMG, $inf[0], $inf[1]);
			$str .= str_replace($marker_child, $marker_info, $template_child);
			
		}

		$str = str_replace($marker, $str, $template);
		return  $str;
	}



	function add_photo(){

		if( isset($_POST['enter_add_photo']) && !empty($_FILES['add_photo_input']) ){

			if( $photo_name = img_upload('add_photo_input', PATH_UPLOADS) ){
				$alt = !empty($_POST['photo_alt']) ? $_POST['photo_alt'] : 'shimansky.by';

				$sql = "INSERT INTO `bd_shimansky`.`photo` (`photo`.`id`, `photo`.`photo_img`, `photo`.`photo_alt`, `photo`.`photo_add_time`) 
				VALUES (NULL, '$photo_name', '$alt', NULL)";
				
				mysql_query($sql);

				$_GET['type_message'] = 6; //it`s OK//

			}else if( isset($_GET['type_message']) && !empty( $_GET['type_message']) ){
				 $_GET['type_message'];
			}else{
				$_GET['type_message'] = 5;
			}
			

		}

	}

	function get_add_photo_form(){

		$template = file_get_contents(PATH_TEMPLATE . 'add_photo_form.tpl');

		return $template;
	}


	function edit_page_info(){
	
		if( isset($_POST['enter']) ){

			$p_id     = isset($_POST["p_id"]) ? $_POST["p_id"] : 0 ;
		
			$title_id = "title_id=" . $p_id;
			$descr_id = "descr_id=" . $p_id;
			$keywords_id = "keywords_id=" . $p_id;

			$title    = isset($_POST[$title_id]) ? $_POST[$title_id] : '' ;
			$descr    = isset($_POST[$descr_id]) ? $_POST[$descr_id] :  '' ;
			$keywords = isset($_POST[$keywords_id]) ? $_POST[$keywords_id] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$keywords = mysql_escape_string($keywords);

			if(strlen($title)>=0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = '$p_id'";

				mysql_query($sql);

				$_GET['type_message'] = 1;

			}else{
				$_GET['type_message'] = 2;
			}
		}


	}

	function get_page_info_form(){

		$id = 0;
		$page_name = '';

		$page = isset($_GET['i_page']) ? $_GET['i_page'] : '';
		$page = my_string($page);

		switch($page){
			case 'p_photo':
				$id = 5;
				$page_name = "Портфолио / Фотографии";
				break;
			case 'p_video':
				$id = 10;
				$page_name = "Портфолио / Видео";
				break;

			case 'p_blog':
				$id = 3;
				$page_name = "Блог";
				break;

			case 'p_reviews':
				$id = 4;
				$page_name = "Отзывы";
				break;
		}

		$sql = "SELECT `pages`.`id_page`, `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = '$id'";

		$marker      = array('{ID}', '{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}', '{HEAD_NAME}');
		$data        = mysql_query($sql);
		$inf         = mysql_fetch_array($data);
		$template    = file_get_contents(PATH_TEMPLATE . 'page_info_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] , $inf[4], $page_name);
		$str         = str_replace( $marker, $marker_info, $template );

		return $str;
	}

	function get_new_reviews_form(){

		$sql   = "SELECT  `review_img`, `review_name`, `review_text`, `review_date`, `review_email`, `id` FROM `bd_shimansky`.`reviews` WHERE `visible` = 0 ORDER BY `review_date` DESC";
		$data  = mysql_query( $sql );
		$count = mysql_affected_rows();

		$template = file_get_contents(PATH_TEMPLATE . 'new_reviews_form.tpl');
		
		$marker        = array('{REVIEWS_ITEM}');
		$marker_child  = array( '{PATH_UPLOADS_IMG}', '{IMG}', '{NAME}', '{TEXT}', '{DATE}', '{EMAIL}', '{ID}' );
		$str = '';

		if($count == 0){
			$_GET['type_message'] = 4;
		}
		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			if( is_file( ROOT . '/img/uploads/thumb/' . $inf[0] ) ){
				$template_child = file_get_contents(PATH_TEMPLATE . 'new_reviews_item_form.tpl');
			}else{
				$template_child = file_get_contents(PATH_TEMPLATE . 'new_reviews_item_wo_img_form.tpl');
			}
			$marker_info = array( PATH_THUMB_IMG, $inf[0], $inf[1], $inf[2], $inf[3], $inf[4], $inf[5]);
			$str .= str_replace($marker_child, $marker_info, $template_child);
			
		}

		$str = str_replace($marker, $str, $template);
		return  $str;

	}

	function publish_reviews(){

		if( !empty($_POST['enter_publish_review']) && !isset($_POST['enter_publish_all_reviews']) ){

			$r_id = $_POST['enter_publish_review'];

			$sql = "UPDATE  `bd_shimansky`.`reviews` SET `visible` = 1 WHERE  `reviews`.`id` = '$r_id'";
			mysql_query($sql);

		}else if(isset($_POST['enter_publish_all_reviews'])){
			$sql = "UPDATE  `bd_shimansky`.`reviews` SET `visible` = 1 WHERE  `reviews`.`visible` = 0";
			mysql_query($sql);
		}


	}

	function del_reviews(){

		if( !empty($_GET['del_review']) ){

			$id = $_GET['del_review'];
			$sql = "DELETE FROM `bd_shimansky`.`reviews` WHERE `ID` = '$id'";

			if(mysql_query($sql)){
				$_GET['type_message'] = 9;
			}else{
				$_GET['type_message'] = 2;
			}


		}
	}

	function get_all_reviews_form(){

		$sql   = "SELECT  `review_img`, `review_name`, `review_text`, `review_date`, `review_email`, `id` FROM `bd_shimansky`.`reviews` ORDER BY `review_date` DESC";
		$data  = mysql_query( $sql );
		$count = mysql_affected_rows();

		$template = file_get_contents(PATH_TEMPLATE . 'all_reviews_form.tpl');
		
		$marker        = array('{REVIEWS_ITEM}');
		$marker_child  = array( '{PATH_UPLOADS_IMG}', '{IMG}', '{NAME}', '{TEXT}', '{DATE}', '{EMAIL}', '{ID}' );
		$str = '';

		if($count == 0){
			$_GET['type_message'] = 4;
		}
		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			if( is_file( ROOT . '/img/uploads/thumb/' . $inf[0] ) ){
				$template_child = file_get_contents(PATH_TEMPLATE . 'reviews_item_form.tpl');
			}else{
				$template_child = file_get_contents(PATH_TEMPLATE . 'reviews_item_form_wo_img.tpl');
			}
			$marker_info = array( PATH_THUMB_IMG, $inf[0], $inf[1], $inf[2], $inf[3], $inf[4], $inf[5]);
			$str .= str_replace($marker_child, $marker_info, $template_child);
			
		}

		$str = str_replace($marker, $str, $template);
		return  $str;

	}

	function get_edit_reviews_form(){

		if(!empty($_GET['edit_review'])){
			$r_id = $_GET['edit_review'];
			$sql = "SELECT `reviews`.`id`, `reviews`.`review_name`, `reviews`.`review_text`, `reviews`.`review_img` FROM `bd_shimansky`.`reviews` WHERE `reviews`.`id` = '$r_id'";

			$marker       = array('{PATH_UPLOADS_IMG}','{ID}', '{NAME}', '{TEXT}', '{IMG}');
			$data         = mysql_query($sql);
			$inf          = mysql_fetch_array($data);
			$template     = '';

			if( (strlen($inf[3])>30) && is_file( ROOT . '/img/uploads/thumb/' . $inf[3] ) ){
				$template = file_get_contents(PATH_TEMPLATE . 'edit_review_form.tpl');
			}else{
				$template = file_get_contents(PATH_TEMPLATE . 'edit_review_form_wo_img.tpl');
			}

			$marker_info  = array( PATH_THUMB_IMG, $inf[0], $inf[1], $inf[2], $inf[3] );
			$str          = str_replace( $marker, $marker_info, $template );

			return $str;
		
		}else{
			$_GET['type_message'] = 2;
			return false;
		}

	}

	function edit_review(){

		if(isset($_POST['enter_edit_review'])){

			$name     = isset($_POST['review_name']) ? $_POST['review_name'] : '' ;
			$text     = isset($_POST['review_edit_text']) ? $_POST['review_edit_text'] :  '' ;

			$text     = isset($_POST['review_edit_text']) ? $_POST['review_edit_text'] :  '' ;

			$title    = mysql_escape_string($title);
			$descr    = mysql_escape_string($descr);
			$text     = mysql_escape_string($text);
			$keywords = mysql_escape_string($keywords);

			if(strlen($text)>0 && strlen($title)>0){

				$sql = "UPDATE  `bd_shimansky`.`pages` SET `page_title`='$title', `description`='$descr', `page_content`='$text', `keywords`='$keywords'
				WHERE  `pages`.`id_page` = 1";
				mysql_query($sql);

				$_GET['type_message'] = 1;

			}else{
				$_GET['type_message'] = 2;
				return false;
			}
		}
	}

	function del_review_img(){

		$id       = $_GET['del_review_img'];
		$sql_img  = "SELECT `reviews`.`review_img` FROM `bd_shimansky`.`reviews` WHERE `id` = '$id'";
		$data_img = mysql_query($sql_img);
		$inf_img  = mysql_fetch_array($data_img);

		if(!empty($_GET['del_review_img']) && (strlen($inf_img[0])>30)  ){

			$sql_upd = "UPDATE `bd_shimansky`.`reviews` SET `reviews`.`review_img` = '' WHERE `id` = '$id'";

			if( $data = @mysql_query($sql_img) ){

				$inf_img         = mysql_fetch_array($data);
				$file_name       = PATH_UPLOADS . basename($inf_img[0]);

				$file_name_thumb = PATH_UPLOADS .'thumb/' . basename($inf_img[0]);

		        if(file_exists($file_name)) {

		            unlink($file_name);
					$_GET['type_message'] = 10;
		        }

		        if(file_exists($file_name_thumb)) {

		            unlink($file_name_thumb);
					$_GET['type_message'] = 10;
		        }

		        mysql_query($sql_upd);

			}else{
				$_GET['type_message'] = 2;
			}

		}
	}

	function edit_reviews(){

		if(isset($_POST['enter_edit_review'])){

			$r_name    = isset($_POST['review_name']) ? $_POST['review_name'] : '' ;
			$r_text    = isset($_POST['review_edit_text']) ? $_POST['review_edit_text'] :  '' ;
			$r_id = isset($_POST['review_item']) ? $_POST['review_item'] : 0;

			$r_name    = mysql_escape_string($r_name);
			$r_text    = mysql_escape_string($r_text);

			$sql_upd = "UPDATE `bd_shimansky`.`reviews` SET `reviews`.`review_name` = '$r_name', `reviews`.`review_text`='$r_text' WHERE `reviews`.`id` = '$r_id'";
			
			if(mysql_query($sql_upd)){
				$_GET['type_message'] = 1;
			}else{
				$_GET['type_message'] = 2;
			}
		}

	}

	function get_add_post_form(){

		$template = file_get_contents(PATH_TEMPLATE . 'add_post_form.tpl');
		$marker = array('{TITLE}', '{TEXT}', '{DESCR}');

		if(!empty($_POST['post_descr']) && !empty($_POST['post_title'])){

			$title = $_POST['post_title'];
			$text = isset($_POST['full_text_post']) ? $_POST['full_text_post'] : '';
			$descr = $_POST['post_descr'];
			$marker_info = array($title, $text, $descr);
			
		}else{
			$marker_info = array('', '', '');
		}

		$template = str_replace($marker, $marker_info, $template);

		return $template;
	}

	function add_img_post(){
		
		if(!empty($_FILES['add_photo_post'])){

			$img_name = '';

			if($_FILES['add_photo_post']['size'] > 600000){
				$_GET['type_message'] = 7;
				return '';
			}

			

			if($img_name = img_upload('add_photo_post', PATH_UPLOADS)){
				return $img_name;
			}
			
		}else{
			return '';
		}

	}

	function add_post(){

		if(isset($_POST['post_title']) && isset($_POST['post_descr']) && isset($_POST['enter_add_post'])){

			$descr = !empty($_POST['post_descr']) ? $_POST['post_descr'] : '';
			$title = !empty($_POST['post_title']) ? $_POST['post_title'] : '';
			$text  = isset($_POST['full_text_post']) ? $_POST['full_text_post'] : '';

			$img_name = add_img_post();

			$sql = "INSERT INTO `bd_shimansky`.`posts` (`post_title`, `post_description`, `post_content`, `post_thumbnail`) VALUES ('$title', '$descr', '$text', '$img_name')";
		
			if(($_GET['type_message'] != 7) && mysql_query($sql)){
					$_POST['post_descr'] = '';
					$_POST['post_title'] = '';
					$_POST['full_text_post'] = '';

					$_GET['type_message'] = 11;	
				
			}else if($_GET['type_message'] != 7){
				$_GET['type_message'] = 2;
			}

		}

	}




?>