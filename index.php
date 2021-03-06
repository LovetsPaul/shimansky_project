<?php

include('config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');
include(PATH_INCLUDES . 'social_object.php');

session_start();

	$url = strtolower( $_SERVER[ REQUEST_URI ] );
   

    if($url == "/"){
    	$Page = "index";
    	$Module = "index";
    }else{
    	$URL_Parts = explode("/", trim($url, " /") );

    	$Page = array_shift($URL_Parts);
    	$Module = array_shift($URL_Parts);
    }

    if( !empty($Module) ){

    	$Params = array();

    	for( $i=0; $i<count($URL_Parts); $i++){
    		$Params[ $i ] = $URL_Parts[$i];
    	}
    	
		
	    $id = $Params[0];

    }

    $marker      = array( '{GET_HEADER}', '{MENU}', '{IS_HOME_CLASS}', '{PATH_CSS}', '{GET_FOOTER}','{PATH_IMG}', '{PATH_JS}', '{PAGE_TITLE}', '{PAGE_KEYWORDS}', '{PAGE_DESCRIPTION}', '{PAGE_NAME}', '{SLIDER}', '{PAGE_CONTENT}', '{POSTS}', '{ONE_POST}', '{REVIEWS}', '{PATH_UPLOADS_IMG}', '{PATH_THUMB_IMG}', '{PHONE}', '{EMAIL}', '{VKONTAKTE}', '{FACEBOOK}', '{INSTAGRAMM}', '{PHOTOS}', '{VIDEOS}', '{PHOTO_GALLERY_CONTAINER}', );
    $marker_info = array(  get_header(), get_menu($url), set_is_home_class(), PATH_CSS , get_footer(), PATH_IMG, PATH_JS,  get_page_title($url), get_page_keywords($url), get_page_description($url), get_page_name($url), get_slider(), get_page_content($url), get_posts(), get_one_post( $id), get_reviews(), PATH_UPLOADS_IMG, PATH_THUMB_IMG, $contacts->phone, $contacts->email, $contacts->vkontakte, $contacts->facebook, $contacts->instagramm, get_portfolio_photos(), get_portfolio_videos(), get_photo_gallery() );


    if($Page == "index"){

	    $page = file_get_contents(PATH_TEMPLATE . 'index.tpl');
	    $page = str_replace($marker, $marker_info, $page);

	    echo $page;
	}elseif($Page == "blog" && empty($Module)){

	    $pages = file_get_contents(PATH_TEMPLATE . 'blog.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;
	}elseif($Page == "blog" && $Module == "full_post" && $Params[0]){

	    $pages = file_get_contents(PATH_TEMPLATE . 'blog_full_post.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);
	    echo $pages;
	}elseif($Page != "blog" && $Params[0] != '' ){
        header('Location: /');
    }elseif($Page == "reviews"){

	    $pages = file_get_contents(PATH_TEMPLATE . 'reviews.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;

	}elseif($Page == "portfolio" && $Module == "photo"){

	    $pages = file_get_contents(PATH_TEMPLATE . 'portfolio_photo.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;
	}elseif($Page == "portfolio" && $Module == "video"){

	    $pages = file_get_contents(PATH_TEMPLATE . 'portfolio_video.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;
	}elseif($Page == "contacts"){

	    $pages = file_get_contents(PATH_TEMPLATE . 'contacts.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;
	}elseif($Page == "about"){

	    $pages = file_get_contents(PATH_TEMPLATE . 'about.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;
	}elseif($Page == "svadba" or $Page == "korporativ" or $Page == "vipusknoi"){

	    $pages = file_get_contents(PATH_TEMPLATE . 'user_page.tpl');
	    $pages = str_replace($marker, $marker_info, $pages);

	    echo $pages;
	}elseif($Page == "anketa"){

        $pages = file_get_contents(PATH_TEMPLATE . 'anketa.tpl');
        $pages = str_replace($marker, $marker_info, $pages);

        echo $pages;

    }elseif($Page == "index.php"){
        header('Location: /');
    }elseif($Page == "err404"){
        $pages = file_get_contents(PATH_TEMPLATE . 'err404.tpl');
        $pages = str_replace($marker, $marker_info, $pages);

        header("HTTP/1.0 404 Not Found");
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");

        echo $pages;

	}elseif($Page == ADMIN_URL){
        $_SESSION['access'] = true;
        header('Location: /admin/');
    }elseif( ($Page == 'admin') && (empty($_SESSION['access'])) ){
        header('Location: /err404');
    }elseif($Page != 'admin'){
        header('Location: /err404');
    }
?>