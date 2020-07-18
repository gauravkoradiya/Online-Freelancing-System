<?php
include("Config.php");
mysql_query("Delete from contactustbl where comp_id=".$_REQUEST['cid'],$con)or die("Error In Delete Query");
header("location:complaints.php");
?>