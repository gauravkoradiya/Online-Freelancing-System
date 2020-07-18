<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
?>
<div id="tooplate_middle">
	<div id="mid_title">Your Biding projects</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
<style type="text/css">
.link{
	font-family:Arial, Helvetica, Sans-serif;
	font-size:10px;
	display:inline-block;
	border:solid 1px #333;
	background:#CCC;
	color:#333;
	text-decoration:none;
	padding:5px;
	
}
.link:hover{
	border:solid 1px #CCC;
	background:#333;
	color:#CCC;
}
</style>
	<?php
				 
$result1=mysql_query("select * from bidtbl where employee_id=".$eid )or die("Error");
if(mysql_num_rows($result1)>0)
{
		
						while($r1=mysql_fetch_array($result1))
						{
							
				$result2=mysql_query("select p_id,p_name,details,skill_id from prjtbl where p_id= ".$r1[2],$con)or die("Error in Select Query");
						
				if(mysql_num_rows($result2)>0)
				{
					while($r2=mysql_fetch_array($result2))
					{ 
				?>
						<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E"><?php echo $r2[1]; ?></td>
<tr>
	<td align="left"><?php echo $r2[2]; ?></td></tr>

	<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r2[3]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
	
	<tr>
	<td><a href="employeebidprjview.php?pid=<?php echo $r2[0]; ?> &amp; bid=<?php echo $r1[0];?>" class='link'>More Info</a>
		<a href="editbid.php?pid=<?php echo $r2[0]; ?> &amp; bid=<?php echo $r1[0];?>" class='link'>Edit Biding</a>
	</td>
</tr>
</table>				
				<?php	}
						}
						}
						}
						
	
include("footer.php"); 
?>