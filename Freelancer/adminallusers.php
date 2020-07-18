<?php
session_start();
include("header.php");
include("Config.php");

	$em= $_SESSION['em'];

?>
<div id="tooplate_middle">
	<div id="mid_title">All Employees</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<table width="100%">
	<tr><th></th><th>First Name</th><th>Last Name</th><th>Email</th><th>User Name</th><th>Contact Number</th><th>Address</th><th>City</th></tr>
<?php
	
	$result1=mysql_query("select * from employee_regitbl",$con)or die(mysql_error());
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ ?>
	<tr>
	<td align="center"><a href="adminemployeedel.php?eid=<?php echo $r1[0];?>">Delete</a></td>
	<td align="center"><?php echo $r1[1];?></td>
	<td align="center"><?php echo $r1[2];?></td>
	<td align="center"><?php echo $r1[3];?></td>
	<td align="center"><?php echo $r1[4];?></td>
	<td align="center"><?php echo $r1[6];?></td>
	<td align="center"><?php echo $r1[8];?></td>
	<td align="center"><?php echo $r1[9];?></td>
	</tr>
	<?php
		}
	}
	?>
	</table>
	<div class="cleaner"></div>
			</div>
	
			<div class="cleaner"></div>
		</div> <!-- end of main -->

		<div id="tooplate_main_bot"></div>
	
	
	<div id="tooplate_middle">
	<div id="mid_title">All Employers</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<table width="100%">
	<tr><th></th><th>First Name</th><th>Last Name</th><th>Email</th><th>User Name</th><th>Company Name</th><th>Company Address</th><th>Contact Number</th><th>City</th></tr>
<?php
	
	$result1=mysql_query("select * from employer_regitbl",$con)or die(mysql_error());
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ ?>
	<tr>
	<td align="center"><a href="adminemployerdel.php?e_id=<?php echo $r1[0];?>">Delete</a></td>
	<td align="center"><?php echo $r1[1];?></td>
	<td align="center"><?php echo $r1[2];?></td>
	<td align="center"><?php echo $r1[3];?></td>
	<td align="center"><?php echo $r1[4];?></td>
	<td align="center"><?php echo $r1[6];?></td>
	<td align="center"><?php echo $r1[7];?></td>
	<td align="center"><?php echo $r1[9];?></td>
	<td align="center"><?php echo $r1[10];?></td>
	</tr>
	<?php
		}
	}
	?>
	</table>
	
	<?php
include("footer.php"); 
?>