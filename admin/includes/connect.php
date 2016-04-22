<?php


$DB = mysql_connect('127.0.0.1', BD_LOGIN, BD_PASSWORD) or die('no connect MYSQL');
mysql_select_db(BD_BASE, $DB) or die('no select Base');

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
mysql_query('SET NAMES utf8 COLLATE utf8_general_ci');
mysql_query("SET @@lc_time_names='ru_RU'")

?>