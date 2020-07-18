<?php
include("Config.php");
mysql_query("Delete from catetbl where cate_id=".$_REQUEST['cid'],$con)or die("Error In Delete Query");
header("location:category.php");
?>