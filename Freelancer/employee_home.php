<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
	$em= $_SESSION['em'];
	$sql = "select * from employee_regitbl where em='$em'";   
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
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
	<div id="mid_title">WelCome <?php echo $_SESSION['unm'];?><br>
	<img src="UserImages/<?php echo $row[13];?>" height="90" width="90"/>
	<br><a>Payment</a><br><a href="employee_acc.php">Account Details</a></div>
	<div id="mid_title">Allocated Project List</div>
</div>  <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<?php
	$result1=mysql_query("select p_id from prj_allocated where employee_id=".$eid,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ 
			$result2=mysql_query("select * from prjtbl where p_id=".$r1[0],$con)or die("Error in Select Query2");
			if(mysql_num_rows($result2)>0)
			{
				while($r2=mysql_fetch_array($result2))
				{ 
	?>
	
<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E"><?php echo $r2[2]; ?></td>
<tr>
	<td align="left"><?php echo $r2[5]; ?></td></tr>

	<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r2[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
	<tr>
	<td><a href="employeeallocateprjview.php?pid=<?php echo $r2[0]; ?>" class='link'>More Info</a>
	<a href="employeeallocateprjview.php?pid=<?php echo $r2[0]; ?>" class='link'>Submit Project</a>
	<a href="message.php?pid=<?php echo $r2[0]; ?>" class='link'>Message</a>
	</td>
</tr>
</table>
			<?php	
				}
			}
		}
	}
					?>	
<div class="cleaner"></div>
			</div>
	
			<div class="cleaner"></div>
		</div> <!-- end of main -->

		<div id="tooplate_main_bot"></div>
		
		
		<div id="tooplate_middle">
	<div id="mid_title"></div>
	<div id="mid_title">Complete Project List</div>
</div>  <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<?php
	$result1=mysql_query("select p_id from completeprj where employee_id=".$eid,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ 
			$result2=mysql_query("select * from prjtbl where p_id=".$r1[0],$con)or die("Error in Select Query2");
			if(mysql_num_rows($result2)>0)
			{
				while($r2=mysql_fetch_array($result2))
				{ 
	?>
	
<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E"><?php echo $r2[2]; ?></td>
<tr>
	<td align="left"><?php echo $r2[5]; ?></td></tr>

	<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r2[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
	
	<tr>
	<td><a href="employeecompleteprjview.php?pid=<?php echo $r2[0]; ?>" class='link'>More Info</a>
	</td>
</tr>
</table>
			<?php	
				}
			}
		}
	}
					?>	
<div class="cleaner"></div>
			</div>
	
			<div class="cleaner"></div>
		</div> <!-- end of main -->

		<div id="tooplate_main_bot"></div>
		
		
		
<div id="tooplate_middle">
	<div id="mid_title">All Project List</div>
	<div class="cleaner"></div>
</div> 
<!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<?php
				$result=mysql_query("select * from prjtbl where p_id NOT IN (select p_id from completeprj) AND p_id NOT IN (select p_id from prj_allocated)  AND p_id NOT IN (select p_id from employerpaytbl)",$con)or die("Error in Select Query");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>	<br />
<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E"><?php echo $r[2]; ?></td>
<tr>
	<td align="left"><?php echo $r[5]; ?></td></tr>

	<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
	
	<tr>
	<td><a href="viewprj1.php?pid=<?php echo $r[0]; ?>" class='link'>More Info</a>
		<a href="viewprj1.php?pid=<?php echo $r[0]; ?>" class='link'>Bid Now</a>
		
	</td>
</tr>
</table>
				<?php	}
				}
				?>
				
	
	<?php
include("footer.php"); 
?>