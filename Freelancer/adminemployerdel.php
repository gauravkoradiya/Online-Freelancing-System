<?php
include("Config.php");
mysql_query("Delete from employer_regitbl where employer_id=".$_REQUEST['e_id'],$con)or die("Error In Delete Query");
header("location:adminallusers.php");
?>