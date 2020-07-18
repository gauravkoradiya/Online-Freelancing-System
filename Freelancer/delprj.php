<?php
include("Config.php");
mysql_query("Delete from prjtbl where p_id=".$_REQUEST['pid'],$con)or die("Error In Delete Query");
header("location:DefaultHome.php");
?>