<?php

	$sql = "SELECT `phone`, `e-mail`, `vkontakte`, `facebook`, `instagramm` FROM social";
	$data = mysql_query( $sql );
	$inf = mysql_fetch_array( $data );

	$contacts = new ArrayObject;

	$contacts->phone = $inf[0];
	$contacts->email = $inf[1];
	$contacts->vkontakte = $inf[2];
	$contacts->facebook = $inf[3];
	$contacts->instagramm = $inf[4];


?>