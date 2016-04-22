<?php
	function MyString($str1){

		$str = $str1;
		$str = trim($str);
		$str = stripslashes($str);
		// $str = htmlspecialchars($str, ENT_QUOTES);
		$str = nl2br($str);
		return $str;
	}

	function replace($marker_array, $marker_info, $shablon){

		$page = file_get_contents(PATH_TEMPLATE . $shablon);
		$page = str_replace($marker_array, $marker_info, $page);
		return $page;
	}

	function get_info_message($par){
		
		$par = (int)$par;

		if( isset($_GET['type_message']) ){
			$message_tpl = '';

			if( $par ==	1 ){
				$message_tpl = file_get_contents(PATH_TEMPLATE . "message_ok.tpl");
			}else if( $par == 2 ){
				$message_tpl = file_get_contents(PATH_TEMPLATE . "message_error.tpl");
			}else{
				$message_tpl =  '';
			}

			return $message_tpl;

		}else{
			return '';
		}
			
	}

	function get_home_edit_form(){

		$sql = "SELECT `pages`.`page_title`, `pages`.`page_content`, `pages`.`keywords`, `pages`.`description` 
		FROM `pages` WHERE pages.`id_page` = 1";
		$marker = array('{TITLE_VALUE}', '{TEXT_VALUE}', '{KEYWORDS_VALUE}', '{DESCR_VALUE}');
		$data = mysql_query($sql) or die(mysql_error());
		$inf = mysql_fetch_array($data);
		$shablon = file_get_contents('../templates/home_edit_form.tpl');
		

			$marker_info = array( $inf[0], $inf[1], $inf[2], $inf[3] );
			$str = str_replace( $marker, $marker_info, $shablon );

		return $str;
	}

	

	function edit_home_content(){

		if( isset($_POST['enter']) ){
			$title = isset($_POST['home_title']) ? $_POST['home_title'] : '' ;
			$descr =  isset($_POST['home_descr']) ? $_POST['home_descr'] :  '' ;
			$text = isset($_POST['home_edit_text']) ? $_POST['home_edit_text'] :  '' ;
			$keywords = isset($_POST['home_keywords']) ? $_POST['home_keywords'] :  '' ;

			$title = mysql_escape_string($title);
			$descr = mysql_escape_string($descr);
			$text = mysql_escape_string($text);
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
?>