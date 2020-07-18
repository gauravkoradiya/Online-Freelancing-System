<?php
session_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
?>
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
		
				$result2=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
				
				if(mysql_num_rows($result2)>0)
				{
					while($r2=mysql_fetch_array($result2))
					{ 
				?>
				
						<tr>
						<td>Project Name</td><td>:</td>
						<td align="center"><?php echo $r2[2]; ?></td></tr>
						<tr><td>Details</td><td>:</td><td align="center"><?php echo $r2[5]; ?></td></tr>
						<tr><td>Budget</td><td>:</td><td align="center"><?php echo $r2[6]; ?></td></tr>
						<tr><td>Days to Complete</td><td>:</td> <td align="center"><?php echo $r2[7]; ?></td></tr>
						<?php 
						$result3=mysql_query("select * from employer_regitbl where employer_id=".$r2[1]);
						if(mysql_num_rows($result3)>0)
				{
					while($r3=mysql_fetch_array($result3))
					{ 
						?>
						<tr><td>Posted by</td><td>:</td><td align="center"><input type="hidden" name="e_id" value="<?php echo $r3[0];?>" /><?php echo $r3[4]; ?></td></tr>
				<?php } } ?>
						<tr><td>Date of Posted</td><td>:</td><td align="center"><?php echo $r2[9]; ?></td></tr>
				<tr><td>Required file</td><td>:</td>
				<td align="center"><a class="link" href="UserFiles/<?php echo $row['$r[8]'] ?>" target="_blank">view file</a></td></tr>
				
				
				<?php	}
				}
				?>
				
				<tr><td></td><td></td><td><input type="hidden" name="pid" value="<?php echo $p;?>" /></td></tr>
				</table><br>
				<caption><b><u>Biding on this Project...</u></b></caption>
				<br>
				
				
				<table width="70%">
				<tr><th>Employee Name</th><th>Budget</th><th>Days to Complete</th></tr>
				
				<?php
				$result4=mysql_query("select * from bidtbl where project_id=".$p);
						if(mysql_num_rows($result4)>0)
				{
					while($r4=mysql_fetch_array($result4))
					{ 
			
				$result5=mysql_query("select * from employee_regitbl where employee_id=".$r4[1]) or die("Error");
				
				
				
				if(mysql_num_rows($result5)>0)
				{
					while($r5=mysql_fetch_array($result5))
					{ 
						?>
						<tr>
						<td align="center"><?php echo $r5[4];?></td>
				<?php } }?>
				<td align="center"><?php echo $r4[3];?></td>
				<td align="center"><?php echo $r4[4];?></td></tr>
				<?php } } ?>
				</table>
				
				</form>
<?php
include("footer.php");
?>