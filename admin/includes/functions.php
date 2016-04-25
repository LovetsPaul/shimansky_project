<?php
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
		$data        = mysql_query($sql) or die(mysql_error());
		$inf         = mysql_fetch_array($data);
		$shablon     = file_get_contents(PATH_TEMPLATE . 'home_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );

		$str = str_replace( $marker, $marker_info, $shablon );

		return $str;
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
			}
		}
	}

	function get_about_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 2";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql) or die(mysql_error());
		$inf         = mysql_fetch_array($data);
		$shablon     = file_get_contents(PATH_TEMPLATE . 'about_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $shablon );

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
		$data        = mysql_query($sql) or die(mysql_error());
		$inf         = mysql_fetch_array($data);
		$shablon     = file_get_contents(PATH_TEMPLATE . 'wedding_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $shablon );

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
			}
		}

		
	}

	function get_corporate_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 8";

		$marker      = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data        = mysql_query($sql) or die(mysql_error());
		$inf         = mysql_fetch_array($data);
		$shablon     = file_get_contents(PATH_TEMPLATE . 'corporate_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $shablon );

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
		$data        = mysql_query($sql) or die(mysql_error());
		$inf         = mysql_fetch_array($data);
		$shablon     = file_get_contents(PATH_TEMPLATE . 'vipusknoi_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
		$str         = str_replace( $marker, $marker_info, $shablon );

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
		$shablon     = file_get_contents(PATH_TEMPLATE . 'contacts_edit_form.tpl');
		$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] , $inf[4] , $inf[5] , $inf[6], $inf[7] );
		$str         = str_replace( $marker, $marker_info, $shablon );

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
				mysql_query($sql) or die(mysql_error());

				$_GET['type_message'] = 1;

			}else{
				$_GET['type_message'] = 2;
			}
		}
	}

	function get_add_video_form(){

		$shablon = file_get_contents(PATH_TEMPLATE . 'add_video_form.tpl');

		return $shablon;
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

		$sql = "SELECT `id`, `description`, `video_src` FROM `bd_shimansky`.`video` ORDER BY `id` DESC";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'del_video_form.tpl');
		$shablon_child = file_get_contents(PATH_TEMPLATE . 'del_video_item_form.tpl');
		$marker = array('{VIDEO_ITEM_FOR_DEL}');
		$marker_child = array( '{ID_VIDEO}', '{VIDEO_NAME}', '{VIDEO_URL}' );
		$str = '';
		if($count == 0){
			$_GET['type_message'] = 4;
		}
		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			$marker_info = array( $inf[0], $inf[1], $inf[2]);
			$str .= str_replace($marker_child, $marker_info, $shablon_child);
			
		}

		$str = str_replace($marker, $str, $shablon);
		return  $str;
	}

	function video_preview(){

		$id = $_GET['id_del_video'];

		$sql = "SELECT `video_src` FROM `bd_shimansky`.`video` WHERE `id` = '$id'";
		$data = mysql_query($sql);
		$inf= mysql_fetch_array($data);
		$video_url = $inf[0];

		return $video_url;
	}

?>