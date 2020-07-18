<?php
include("Config.php");
if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				} 
if(isset($_REQUEST['sid']))
{
	$s=$_REQUEST['sid'];
}if(isset($_REQUEST['skid']))
{
	$sk=$_REQUEST['skid'];
}
mysql_query("Delete from skilltbl where skill_id=".$sk,$con)or die("Error In Delete Query");
$v="skill.php";
header("location:$v?cid=$c& sid=$s");
?>