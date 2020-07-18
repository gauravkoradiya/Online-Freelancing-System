<?php
include("Config.php");
if(isset($_REQUEST['skill_id']))
				{
					$s=$_REQUEST['skill_id'];
				} 
mysql_query("Delete from choosed_skill where skill_id=".$s,$con)or die("Error In Delete Query");
header("location:manageskill.php");
?>