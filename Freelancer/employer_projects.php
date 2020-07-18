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
	?>
<div id="tooplate_middle">
	<div id="mid_title">My Projects</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<table width="100%">
<tr><th></th><th></th><th></th><th>Project Title</th><th>Details</th><th>Budget</th><th>Days to Complete</th><th>Employer Name</th><th>Posted Date</th></tr>
	
	<?php
				$result=mysql_query("select * from prjtbl WHERE employer_id=".$eid,$con)or die("Error in Select Query");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
						<tr>
						<td align="center"><a href="employerviewbid.php?pid=<?php echo $r[0]; ?>">View Biding</a></td>
						<td align="center"><a href="employereditprj.php?pid=<?php echo $r[0]; ?>">Edit</a></td>
						<td align="center"><a href="employerdelprj.php?pid=<?php echo $r[0]; ?>">Delete</a></td>
						<td align="center"><?php echo $r[2]; ?></td>
						<td align="center"><?php echo $r[5]; ?></td>
						<td align="center"><?php echo $r[6]; ?></td>
						
						<td align="center"><?php echo $r[7]; ?></td>
						<?php 
						$res=mysql_query("select * from employer_regitbl where employer_id=".$r[1]);
						if(mysql_num_rows($res)>0)
				{
					while($r1=mysql_fetch_array($res))
					{ 
						?>
						<td align="center"><?php echo $r1[4]; ?></td>
				<?php } } ?>
						<td align="center"><?php echo $r[9]; ?></td>
						</tr>
				<?php	}
				}
				?>
				</table>
	<?php
include("footer.php"); 
?>