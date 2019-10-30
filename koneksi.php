<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "dbistana";
	
	$kon = mysql_connect($host,$user,$pass);
	$kondb = mysql_select_db($db, $kon);
	
?>