<?php
	function MyString($str1){

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

	function get_home_edit_form(){
		$str = file_get_contents('../templates/home_edit_form.tpl');
		return $str;
	}

	

	function edit_home_content(){
		$Name = isset($_POST['name']) ? $_POST['name'] : '' ;
		$Text =  isset($_POST['text']) ? $_POST['text'] :  '' ;
		
		 $Name =MyString($Name);
		 $Text =MyString($Text);

		if(strlen($Name)>0 && strlen($Text)>0)
		{
			$SQL ="INSERT INTO `pages` (`id`, `name`, `text`, `position`, `visible`) VALUES (NULL, '$Name', '$Text', '1', '1')";
			if( mysql_query($SQL) ){
				echo "Пункт меню успешно добавлен.";
			}
		}
	}
?>