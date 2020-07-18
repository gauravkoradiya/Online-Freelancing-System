<?php
include("Config.php");
if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				} 
if(isset($_REQUEST['sid']))
{
	$s=$_REQUEST['sid'];
}
mysql_query("Delete from subcatetbl where sub_id=".$s,$con)or die("Error In Delete Query");
header("location:viewsubcategory.php?cid=".$c);
?>