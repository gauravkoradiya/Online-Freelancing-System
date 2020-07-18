<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
?>
<div id="tooplate_middle">	<div id="mid_title">All Complaints</div>

	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>

<div id="tooplate_main">
	<div id="gallery">
	
	<table width="100%">
	<tr><th></th><th>Email</th><th>Subject</th><th>Message</th></tr>
<?php
	
	$result1=mysql_query("select * from contactustbl",$con)or die(mysql_error());
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{ ?>
	<tr>
	<td align="center"><a href="admincompdel.php?cid=<?php echo $r1[0];?>">Delete</a></td>
	<td align="center"><?php echo $r1[1];?></td>
	<td align="center"><?php echo $r1[2];?></td>
	<td align="center"><?php echo $r1[3];?></td>
	</tr>
	<?php
		}
	}
	?>
	</table>
		<?php
include("footer.php"); 
?>