<?php

	function replace($marker_array, $marker_info, $shablon){

		$page = file_get_contents(PATH_TEMPLATE . $shablon);
		$page = str_replace($marker_array, $marker_info, $page);
		return $page;
	}

	function get_header(){

		$header = file_get_contents( PATH_TEMPLATE . 'header.tpl' );
		return $header;
	}

	function get_footer(){

		$footer = file_get_contents( PATH_TEMPLATE . 'footer.tpl' );
		return $footer;
	}

	function get_page_title($url){

		$sql = "SELECT pages.`page_title` FROM pages WHERE pages.`link` = '$url' and visible = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_page_keywords($url){

		$sql = "SELECT pages.`keywords` FROM pages WHERE pages.`link` = '$url' and visible = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_page_description($url){

		$sql = "SELECT pages.`description` FROM pages WHERE pages.`link` = '$url' and visible = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_page_name($url){

		$sql = "SELECT `page_name_menu` FROM pages WHERE `link` = '$url' and visible = 1";
		$data = mysql_query($sql);
		$inf = mysql_fetch_array($data);
		$str = $inf[0];

		return $str;

	}

	function get_slider(){

		$sql = "SELECT `slider_img_src`, `slider_img_alt` FROM slider WHERE visible = 1 ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'slider.tpl');
		$shablon_item = file_get_contents(PATH_TEMPLATE . 'slider_img.tpl');
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );

			$marker = array( '{SLIDER_IMG_SRC}', '{SLIDER_IMG_ALT}' );
			$marker_info = array( $inf[0], $inf[1] );
			$str .= str_replace( $marker, $marker_info, $shablon_item );

		}

	return	str_replace( '{SLIDER_IMG}', $str, $shablon );

	}

	function get_page_content($url){


		$sql = "SELECT pages.`page_content` FROM pages WHERE pages.`link` = '$url' and visible = 1";
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

		$str = '';

		for( $i=0; $i < $count; $i++){

			$posts_array = mysql_fetch_array( $data );
			$marker = array( '{POST_IMG_PREVIEW}', '{POST_TITLE}', '{POST_DESCR}', '{POST_DATE}', '{POST_ID}' );
			$marker_info = array( $posts_array[0], $posts_array[1], $posts_array[2], $posts_array[3], $posts_array[4]);
			
			if( $posts_array[0] !== ''){
				$str.= 	str_replace( $marker, $marker_info, $post_tpl );
			}else{
				$str.= 	str_replace( $marker, $marker_info, $post_without_img_tpl );
			}

			

		}

		return	$str;
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

		$str = '';

		for( $i=0; $i < $count; $i++){

			$posts_array = mysql_fetch_array( $data );
			$marker = array( '{REVIEW_IMG}', '{REVIEWER_NAME}', '{REVIEW_TEXT}' );
			$marker_info = array( $posts_array[0], $posts_array[1], $posts_array[2]);
			
			if( $posts_array[0] !== ''){
				$str.= 	str_replace( $marker, $marker_info, $review_tpl );
			}else{
				$str.= 	str_replace( $marker, $marker_info, $review_without_img_tpl );
			}

		}

		return $str;
	}

	function get_portfolio_photos(){

		$sql = "SELECT `photo_img`, `photo_alt` FROM photo WHERE gallery = 0 ORDER BY `photo_add_time` DESC ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'portfolio_photo_item.tpl');
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );

			$marker = array( '{PORTFOLIO_PHOTO}', '{PORTFOLIO_PHOTO_ALT}' );
			$marker_info = array( $inf[0], $inf[1] );
			$str .= str_replace( $marker, $marker_info, $shablon );

		}

		return $str;

	}

	function get_photo_gallery(){

		$sql = "SELECT `photo_img`, `photo_alt` FROM photo WHERE gallery = 1 ORDER BY `photo_add_time` DESC ";
		$data = mysql_query( $sql );
		$count = mysql_affected_rows();

		$shablon = file_get_contents(PATH_TEMPLATE . 'gallery_photo_item.tpl');
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );

			$marker = array( '{GALLERY_PHOTO_SRC}', '{GALLERY_PHOTO_ALT}' );
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
		$str = '';

		for( $i=0; $i<$count; $i++ ){

			$inf = mysql_fetch_array( $data );

			$marker = array( '{PORTFOLIO_VIDEO_ITEM}' );
			$marker_info = array( $inf[0] );
			$str .= str_replace( $marker, $marker_info, $shablon );

		}

		return $str;

	}

?>