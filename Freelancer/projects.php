<?php
session_start();
include("header.php");
include("Config.php");

?>
<div id="tooplate_middle">
	<div id="mid_title">All Project List</div>
	<div class="cleaner"></div>
</div> 
<!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
<table width="100%">
	<tr><th></th><th>Project Title</th><th>Details</th><th>Maximum Amount</th><th>Minimum Amount</th><th>Days to Complete</th><th>Posted by</th><th>Posted Date</th></tr>
	
	<?php
				$result=mysql_query("select * from prjtbl",$con)or die("Error in Select Query");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
						<tr>
						<td align="center"><a href="defaultviewprj.php?pid=<?php echo $r[0]; ?>">View</a></td>
						<td align="center"><?php echo $r[2]; ?></td>
						<td align="center"><?php echo $r[5]; ?></td>
						<td align="center"><?php echo $r[6]; ?></td>
						<td align="center"><?php echo $r[7]; ?></td>
						<td align="center"><?php echo $r[8]; ?></td>
						<?php 
						$res=mysql_query("select * from employer_regitbl where employer_id=".$r[1]);
						if(mysql_num_rows($res)>0)
				{
					while($r1=mysql_fetch_array($res))
					{ 
						?>
						<td align="center"><?php echo $r1[4]; ?></td>
				<?php } } ?>
						<td align="center"><?php echo $r[10]; ?></td>
						</tr>
				<?php	}
				}
				?>
				</table>
	
	<?php
include("footer.php"); 
?>