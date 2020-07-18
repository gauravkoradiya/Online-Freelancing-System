<?php
session_start();
include("header.php");
include("Config.php");

	$eid= $_SESSION['employee_id'];
	$sql = "select * from choosed_skill where employee_id='$eid'";   
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	// echo $row[2];
	 $sql1 = "select * from skilltbl where skill_id=".$row[2];   
	$res1=mysql_query($sql1);
	$row1=mysql_fetch_array($res1);
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
	<div id="mid_title">Project By My Skills</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
<?php
	$result1=mysql_query("select DISTINCT skill_id from choosed_skill where employee_id=".$eid,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ 
				$result=mysql_query("select * from prjtbl where skill_id=".$r1[0],$con)or die("Error in Select Query2");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?><table width="100%" border="2">
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
	<td><a href="viewprj.php?pid=<?php echo $r[0]; ?>" class='link'>More Info</a>
		<a href="viewprj.php?pid=<?php echo $r[0]; ?>" class='link'>Bid Now</a>
	</td>
</tr>
</table>
						
				
			
					<?php }
				}					}
				}
				?>
	
	<?php
include("footer.php"); 
?>