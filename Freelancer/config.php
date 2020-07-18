<?php
	$con=mysql_connect("localhost","root","")or
	die("opps something went wrong with connection");
	mysql_select_db("FreeLancer",$con)or
	die("opps something went wrong with database");
?>