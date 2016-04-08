<?php

$method = $_SERVER['REQUEST_METHOD'];

function MyString($str1){

	$str = $str1;
	$str = trim($str);
	$str = stripslashes($str);
	$str = htmlspecialchars($str, ENT_QUOTES);
	$str = nl2br($str);

	return $str;

}

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$project_name = MyString($_POST["project_name"]);
	$admin_email  = MyString($_POST["admin_email"]);
	$form_subject = MyString($_POST["form_subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
}
} else if ( $method === 'GET' ) {

	$project_name = MyString($_GET["project_name"]);
	$admin_email  = MyString($_GET["admin_email"]);
	$form_subject = MyString($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
}
}

$message = "<table cellspacing='0' cellpadding='0' style='width: 100%;'>" . $message . "</table>";

function adopt($text) {

	return "=?utf-8?B?" .base64_encode($text).'?=';
	// if( !empty($_GET['form_subject'] ||  !empty($_POST['form_subject']) ){
	// 	return "=?utf-8?B?" .base64_encode($text).'?=';
	// }else{
	// 	return "=?utf-8?B?" .base64_encode('Запись на чашечку кофе') .'?=';
	// }
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
