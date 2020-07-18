<?php
session_start();
include("header.php");
include("Config.php");
?>
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
<div id="tooplate_middle">
	<div id="mid_title">Project Detail</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	
	<?php
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
 ?>
			  
<form method="post">
	<table width="100%" border="2">				<?php
		
				$result=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
				
						<tr>
						<td>Project Name</td><td align="center" width="10%">:</td>
						<td align="left"><?php echo $r[2]; ?></td></tr>
						<tr><td>Details</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[5]; ?></td></tr>
						<tr><td>Budget</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[6]; ?></td></tr>
						<?php 
						$res1=mysql_query("select * from skilltbl where skill_id=".$r[4]);
						if(mysql_num_rows($res1)>0)
				{
					while($r2=mysql_fetch_array($res1))
					{ 
						?>
						<tr><td>Skill</td><td align="center" width="10%">:</td><td align="left"><input type="hidden" name="e_id" value="<?php echo $r2[0];?>" /><?php echo $r2[1]; ?></td></tr>
				<?php } } ?>
						
						
						<tr><td>Days to Complete</td><td align="center" width="10%">:</td> <td align="left"><?php echo $r[7]; ?></td></tr>
						<?php 
						$res=mysql_query("select * from employer_regitbl where employer_id=".$r[1]);
						if(mysql_num_rows($res)>0)
				{
					while($r1=mysql_fetch_array($res))
					{ 
						?>
						<tr><td>Posted by</td><td align="center" width="10%">:</td><td align="left"><input type="hidden" name="e_id" value="<?php echo $r1[0];?>" /><?php echo $r1[4]; ?></td></tr>
				<?php } } ?>
						<tr><td>Date of Posted</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[9]; ?></td></tr>
				<tr><td>Required file</td><td align="center" width="10%">:</td>
				<td align="left"><a href="UserFiles/<?php echo $row['$r[8]'] ?>" target="_blank">view file</a></td></tr>
				<?php	
					}
				}
				?>
				
				<tr><td></td><td></td><td><input type="hidden" name="pid" value="<?php echo $p;?>" /></td></tr>
				</table>
				<br/>
				<a href="employee_login.php" class='link'>Bid Now</a>
				</form>
<?php
include("footer.php");
?>