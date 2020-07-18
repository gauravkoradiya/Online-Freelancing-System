<?php
include("Config.php");
mysql_query("Delete from employee_regitbl where employee_id=".$_REQUEST['eid'],$con)or die("Error In Delete Query");
header("location:adminallusers.php");
?>