<?php
	function my_string($str1){

		$str = $str1;
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str, ENT_QUOTES);
		$str = nl2br($str);
		return $str;
	}

	function replace($marker_array, $marker_info, $shablon){

		$page = file_get_contents(PATH_TEMPLATE . $shablon);
		$page = str_replace($marker_array, $marker_info, $page);
		return $page;
	}

	function get_header(){

		$header = file_get_contents( PATH_TEMPLATE . 'header.tpl' );
		return $header;
	}

	function set_is_home_class(){
		if( $_SERVER[ REQUEST_URI ] == '/' or $_SERVER[ REQUEST_URI ] == '/portfolio/video' ){
			return "is_home";
		}
	}
	function get_footer(){

		$footer = file_get_contents( PATH_TEMPLATE . 'footer.tpl' );
		return $footer;
	}

	function get_page_title($url){

		$URL_Parts = explode('/', trim($url, " /"));
		$Page= array_shift($URL_Parts);
		$Module = array_shift($URL_Parts);
		$id = array_shift($URL_Parts);

		if($Module != "full_post"){

			$sql = "SELECT pages.`page_title` FROM pages INNER JOIN menu ON pages.`id_menu` = menu.`id` WHERE menu.`link` = '$url' and pages.`visible` = 1";
			$data = mysql_query($sql);
			$inf = mysql_fetch_array($data);
			$str = $inf[0];

			return $str;
		}else{

			$sql = "SELECT `posts`.`post_title` FROM posts WHERE `posts`.`id` = '$id'";
			$data = mysql_query( $sql );
			$inf = mysql_fetch_array($data);
			$str = $inf[0];

			return $str;

		}
		

	}

	function get_page_keywords($url){

		$sql = "SELECT pages.`keywords` FROM pages  INNER JOIN menu  ON pages.`id_menu` = menu.`id` WHERE menu.`link` = '$url' and pages.`visible` = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_page_description($url){

		$sql = "SELECT pages.`description` FROM pages  INNER JOIN menu ON pages.`id_menu` = menu.`id` WHERE menu.`link` = '$url' and pages.`visible` = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_page_name($url){

		$sql = "SELECT `menu_name` FROM menu WHERE menu.`link` = '$url' ";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_child_menu($parent_id){

		$sql = "SELECT `menu_name`, `link`, `is_parent`, `parent_id`, `id` FROM menu WHERE parent_id != 0 ORDER BY `position` ASC";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'inner_menu_item.tpl');
		$shablon_child = file_get_contents(PATH_TEMPLATE . 'menu.tpl');
		$marker = array( '{MENU_NAME}', '{MENU_LINK}' );
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			if($parent_id == $inf[3]){
				$marker_info = array( $inf[0], $inf[1]);
				$str .= str_replace($marker, $marker_info, $shablon_child);
			}
			
		}

		return  $str;

	}

	function get_menu($url){

		$sql = "SELECT `menu_name`, `link`, `is_parent`, `parent_id`, `id` FROM menu WHERE parent_id = 0 AND `visible` = 1 ORDER BY `position` ASC";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();
		$shablon = file_get_contents(PATH_TEMPLATE . 'menu.tpl');
		$shablon_child = file_get_contents(PATH_TEMPLATE . 'inner_menu_item.tpl');
		$marker = array( '{MENU_NAME}', '{MENU_LINK}', '{CLASS_ACTIVE}');
		$marker_child = array( '{PARENT_MENU_NAME}', '{CHILD_MENU_ITEM}', '{CLASS_ACTIVE}', '{CLASS_ACTIVE_PARENT}', '{PARENT}' );
		$str = '';
		$marker_info = array();
		$marker_child_info = array();

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );	

			if( $url == $inf[1] ){

				if ($inf[2] == 1){
					
				$marker_child_info = array( $inf[0], get_child_menu($inf[4]), 'active', 'parent' );
				}else{

					
				$marker_child_info = array( $inf[0], get_child_menu($inf[4]), 'active', '' );
				$marker_info = array( $inf[0], $inf[1], '', '' );
				}

				
			}else{

				if ($inf[2] == 1){
					$marker_info = array( $inf[0], $inf[1], '', '' );
				}else{

					$marker_info = array( $inf[0], $inf[1], '', '' );
				}
				$marker_child_info = array( $inf[0], get_child_menu($inf[4]), '', '');
			}

			if($inf[2] == 1){//if parent
				$marker_info = array( $inf[0], $inf[1], 'active' );
				$marker_child_info = array( $inf[0], get_child_menu($inf[4]), '', 'parent');
				$str .= str_replace( $marker_child, $marker_child_info, $shablon_child );
			
			}else{
				$str .= str_replace( $marker, $marker_info, $shablon );	
			}
		}
		
		return  $str;
	}

	function get_slider(){

		$sql = "SELECT `slider_img_src`, `slider_img_alt` FROM slider WHERE visible = 1 ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'slider.tpl');
		$shablon_item = file_get_contents(PATH_TEMPLATE . 'slider_img.tpl');
		$marker = array('{PATH_IMG}', '{SLIDER_IMG_SRC}', '{SLIDER_IMG_ALT}' );
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			$marker_info = array( PATH_IMG, $inf[0], $inf[1] );
			$str .= str_replace( $marker, $marker_info, $shablon_item );

		}

	return  str_replace( '{SLIDER_IMG}', $str, $shablon );

	}

	function get_page_content($url){

		$sql = "SELECT pages.`page_content` FROM pages INNER JOIN  menu ON pages.`id_menu` = menu.`id`  WHERE menu.`link` = '$url' and pages.`visible` = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];
		
		return $str;

	}

	function get_posts(){

		$sql = " SELECT `posts`.`post_thumbnail`,
						`posts`.`post_title`,
						`posts`.`post_description`,
						 DATE_FORMAT( `posts`.`post_date` , '%d/%M/%y') as post_date,
						`posts`.`id`
				 FROM posts WHERE `posts`.`visible` = 1 ORDER BY `posts`.`post_date` DESC ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$post_tpl = file_get_contents(PATH_TEMPLATE . 'post.tpl');
		$post_without_img_tpl = file_get_contents(PATH_TEMPLATE . 'post_without_img.tpl');
		$marker = array( '{PATH_UPLOAD}', '{POST_IMG_PREVIEW}', '{POST_TITLE}', '{POST_DESCR}', '{POST_DATE}', '{POST_ID}' );
		$str = '';

		for( $i=0; $i < $count; $i++){

			$posts_array = mysql_fetch_array( $data );
			$marker_info = array( PATH_UPLOADS_IMG, $posts_array[0], $posts_array[1], $posts_array[2], $posts_array[3], $posts_array[4]);
			
			if( $posts_array[0] !== ''){
				$str.=  str_replace( $marker, $marker_info, $post_tpl );
			}else{
				$str.=  str_replace( $marker, $marker_info, $post_without_img_tpl );
			}

		}

		return  $str;
	}

	function get_one_post($id){

		$id = (int) $id;
		
		$sql = "SELECT `posts`.`post_title`, `posts`.`post_content`, DATE_FORMAT( `posts`.`post_date` , '%d/%M/%y') as post_date
				 FROM posts WHERE `posts`.`id` = ". $id . " AND `posts`.`visible` = 1 ";

		$data = mysql_query( $sql );
		$inf = mysql_fetch_array( $data );
		$marker = array( '{POST_TITLE}', '{POST_CONTENT}', '{POST_DATE}' );
		$marker_info = array( $inf[0], $inf[1], $inf[2] );

		$str = replace($marker, $marker_info, 'one_post.tpl');
		return $str;
		
	}

	function get_reviews(){

		$sql = " SELECT `reviews`.`review_img`,
						`reviews`.`review_name`,
						`reviews`.`review_text`,
						`reviews`.`id`

				 FROM reviews WHERE `reviews`.`visible` = 1 ORDER BY `reviews`.`review_date` DESC ";

		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$review_tpl = file_get_contents(PATH_TEMPLATE . 'review_with_img.tpl');
		$review_without_img_tpl = file_get_contents(PATH_TEMPLATE . 'review_without_img.tpl');
		$marker = array( '{REVIEW_IMG}', '{REVIEWER_NAME}', '{REVIEW_TEXT}' );
		$str = '';

		for( $i=0; $i < $count; $i++){

			$posts_array = mysql_fetch_array( $data );
			$marker_info = array( $posts_array[0], $posts_array[1], $posts_array[2]);
			
			if( $posts_array[0] !== '' && strlen($posts_array[0] ) > 33 ){
				$str.=  str_replace( $marker, $marker_info, $review_tpl );
			}else{
				$str.=  str_replace( $marker, $marker_info, $review_without_img_tpl );
			}

		}

		return $str;
	}

	function get_portfolio_photos(){

		$sql = "SELECT `photo_img`, `photo_alt` FROM photo WHERE gallery = 0 ORDER BY `photo_add_time` DESC ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'portfolio_photo_item.tpl');
		$marker = array( '{PATH_UPLOAD}','{PORTFOLIO_PHOTO}', '{PORTFOLIO_PHOTO_ALT}' );
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );
			$marker_info = array( PATH_UPLOADS_IMG, $inf[0], $inf[1] );
			$str .= str_replace( $marker, $marker_info, $shablon );

		}

		return $str;

	}

	function get_photo_gallery(){

		$sql = "SELECT `photo_img`, `photo_alt` FROM photo WHERE gallery = 1 ORDER BY `photo_add_time` DESC ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'gallery_photo_item.tpl');
		$marker = array( '{GALLERY_PHOTO_SRC}', '{GALLERY_PHOTO_ALT}' );
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );

			$marker_info = array( $inf[0], $inf[1] );
			$str .= str_replace( $marker, $marker_info, $shablon );

		}

		return $str;

	}

	function get_portfolio_videos(){

		$sql = "SELECT `video_src` FROM video ORDER BY `id` DESC ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'portfolio_video_item.tpl');
		$marker = array( '{PORTFOLIO_VIDEO_ITEM}' );
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );

			$marker_info = array( $inf[0] );
			$str .= str_replace( $marker, $marker_info, $shablon );

		}

		return $str;

	}

	function getProportions($width, $height, $max_w, $max_h) {

	   $ratio = $width / $height;

	   if($max_w>$width || $max_h>$height){
			$max_w = $width;
			$max_h = $height;
	   }
	 
	  if ( $ratio == 1 ) {
		if ( $height > $max_h ) {
		  $height = $width = min($max_w, $max_h);
		}
		else {
		  $width = $max_w;
		  $height = $max_h;
		}
	   }
	  else if ( $ratio > 1 ) {
		$height = ( $height * $max_w ) / $width;
		$width = $max_w;
	  }
	  else if ( $ratio < 1 ) {
		$width = ( $width * $max_h ) / $height;
		$height = $max_h;
	  }
	 
	  return array('width' => $width, 'height' => $height);
	}

	function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){

		$target_path = $target_folder;
		$thumb_path = $thumb_folder;
		$file_ext = substr( $_FILES[$field_name]['type'], 6 );
		$file_name = $_FILES[$field_name]['name'];
		$fileName= $file_name .'.'. $file_ext;

		$upload_image = $target_path.basename($fileName);

		$acces_ext = array('jpg', 'jpeg', 'png', 'gif');
		$is_ok_ext = false;

		foreach($acces_ext as $ext=>$val){
			($file_ext != $val) ? $is_ok_ext = false : $is_ok_ext = true;
			if($is_ok_ext)
				break;
		}
		
		if($is_ok_ext){

			if( ($_FILES[$field_name]['size'] < 2000000) ){

				if(move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_image)){

					if($thumb == TRUE){

						$thumbnail = $thumb_path.$fileName;
						list($width,$height) = getimagesize($upload_image);

						$image_size_prop = getProportions($width, $height, $thumb_width, $thumb_height);
						$thumb_create = imagecreatetruecolor($image_size_prop['width'], $image_size_prop['height']);

						switch($file_ext){
							case 'jpg':
								$source = imagecreatefromjpeg($upload_image);
								break;
							case 'jpeg':
								$source = imagecreatefromjpeg($upload_image);
								break;

							case 'png':
								$source = imagecreatefrompng($upload_image);
								break;
							case 'gif':
								$source = imagecreatefromgif($upload_image);
								break;
							default:
								$source = imagecreatefromjpeg($upload_image);
						}

						imagecopyresampled($thumb_create,$source,0,0,0,0,$image_size_prop['width'], $image_size_prop['height'], $width,$height);
						switch($file_ext){
							case 'jpg' || 'jpeg':
								imagejpeg($thumb_create,$thumbnail,85);
								break;
							case 'png':
								imagepng($thumb_create,$thumbnail,85);
								break;

							case 'gif':
								imagegif($thumb_create,$thumbnail,85);
								break;
							default:
								imagejpeg($thumb_create,$thumbnail,85);
						}

					}

					return $fileName;
				}
				else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
		}
		
		
	}



?>
