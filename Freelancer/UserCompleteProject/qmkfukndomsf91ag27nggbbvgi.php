<?php
include("DBConfig.php");
mysql_query("Delete from tblcourse where courseid=".$_REQUEST['cid'],$con)or die("Error In Delete Query");
header("location:course.php");
?>
