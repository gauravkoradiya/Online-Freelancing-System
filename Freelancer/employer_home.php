<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
	$eid=$_SESSION['employer_id'];
	$em= $_SESSION['em'];
	$sql = "select * from employer_regitbl where em='$em'";   
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
if(isset($_POST['submit']))
{
	mysql_query("update employer_regitbl set balance='".$_POST['addbal']."'where employer_id=".$eid)or die("Error");
}
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
	<div id="mid_title">WelCome <?php echo $_SESSION['unm'];?></div>
	<img src="UserImages/<?php echo $row[14];?>" height="90" width="90"/>
	
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<form method="POST">
	<table>
	<tr><td><input type="text" name="addbal" placeholder="Add Amount to your A/c"></td>
	<td><input type="submit" name="submit" value="Add Balance"></td></tr>
	</table></form>
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
	
	$result1=mysql_query("select * from completeprj where employer_id=".$eid,$con)or die(mysql_error());
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ 
			$result2=mysql_query("select * from prjtbl where p_id=".$r1[1],$con)or die("Error in Select Query2");
			if(mysql_num_rows($result2)>0)
			{
				while($r2=mysql_fetch_array($result2))
				{ 
	?>
	
<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E">
	<?php echo $r2[2]; ?></td>
<tr>
	<td align="left"><?php echo $r2[5]; ?></td></tr>

	<?php 
						$result10=mysql_query("select * from skilltbl where skill_id=".$r2[4]);
						if(mysql_num_rows($result10)>0)
				{
					while($r10=mysql_fetch_array($result10))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r10[1]; ?></td></tr>
				<?php } } ?>
	<tr>
	<td><a href="employercompleteprjview.php?pid=<?php echo $r2[0]; ?>&amp; cid=<?php echo $r1[0];?>" class='link'>More Info</a>
	<a href="employerpayment.php?pid=<?php echo $r2[0]; ?>&amp; cid=<?php echo $r1[0];?>" class='link'>Payment</a>
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
	<div id="mid_title">Allocated Project List</div>
</div>  <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<?php
	
	$result11=mysql_query("select * from prj_allocated where employer_id=".$eid,$con)or die(mysql_error());
	if(mysql_num_rows($result11)>0)
	{
		while($r11=mysql_fetch_array($result11))
		{ 
			$result12=mysql_query("select * from prjtbl where p_id=".$r11[1],$con)or die("Error in Select Query2");
			if(mysql_num_rows($result12)>0)
			{
				while($r12=mysql_fetch_array($result12))
				{ 
	?>
	
<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E">
	<?php echo $r12[2]; ?></td>
<tr>
	<td align="left"><?php echo $r12[5]; ?></td></tr>

	<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r12[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
	<tr>
	<td><a href="prj_allocate.php?pid=<?php echo $r12[0]; ?>" class='link'>More Info</a>
	<a href="message.php?pid=<?php echo $r12[0]; ?>" class='link'>message</a>
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
	<div id="mid_title">Paid Project List</div>
</div>  <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<?php
	
	$result10=mysql_query("select employerpay_id,p_id from employerpaytbl where employer_id=".$eid,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result10)>0)
	{
		while($r10=mysql_fetch_array($result10))
		{ 
			$result20=mysql_query("select * from prjtbl where p_id=".$r10[1],$con)or die("Error in Select Query2");
			if(mysql_num_rows($result20)>0)
			{
				while($r20=mysql_fetch_array($result20))
				{ 
	?>
	
<table width="100%" border="2">
<tr>
	<td align="left" style="font-family:Arial;font-size:20px;color:#B6300E">
	<?php echo $r20[2]; ?></td>
<tr>
	<td align="left"><?php echo $r20[5]; ?></td></tr>
<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r20[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
	
	<tr>
	<td><a href="employercompleteprjview.php?pid=<?php echo $r20[0]; ?>&amp; cid=<?php echo $r10[0];?>" class='link'>More Info</a>
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
				$result=mysql_query("select * from prjtbl WHERE p_id NOT IN (select p_id from completeprj) AND p_id NOT IN (select p_id from prj_allocated) AND p_id NOT IN (select p_id from employerpaytbl) AND employer_id=".$eid,$con)or die("Error in Select Query");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>	<br />
						<table width="100%" border="2">
						<tr><td align="left" style="font-family:Arial;font-size:20px;color:#B6300E"><?php echo $r[2]; ?></td></tr>
						
						<tr><td align="left"><?php echo $r[5]; ?></td></tr>
						
						<?php 
						$result1=mysql_query("select * from skilltbl where skill_id=".$r[4]);
						if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
						?>
						<tr><td align="left" style="font-family:Arial;font-size:15px;color:#6E103C"><?php echo $r1[1]; ?></td></tr>
				<?php } } ?>
						<tr><td><a href="employerviewbid.php?pid=<?php echo $r[0]; ?>" class='link'>More Info</a>
								<a href="employereditprj.php?pid=<?php echo $r[0];?>" class='link'>Edit</a>
								<a href="employerdelprj.php?pid=<?php echo $r[0];?>" class='link'>Delete</a></td></tr>
						</table>
				<?php	}
				}
				?>
				
	
	<?php
include("footer.php"); 
?>