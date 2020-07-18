<?php
session_start();
include("header.php");
include("Config.php");
?>
<div id="tooplate_middle">
<div id="mid_title">	
<?php
	if(isset($_REQUEST['cid']))
	{
		$c=$_REQUEST['cid'];
	}
	if(isset($_REQUEST['sid']))
	{
		$s=$_REQUEST['sid'];
	}
	if(isset($_REQUEST['skid']))
	{
		$sk=$_REQUEST['skid'];
	}
$result=mysql_query("Select sub_name from subcatetbl where sub_id=".$s,$con) or die("Error In Select Query1");
if(mysql_num_rows($result))
{
	while($r=mysql_fetch_array($result))
	{
 		echo $r[0];
 	}
}
?>
</div>
<div class="cleaner"></div>
</div> <!-- end of middle -->
	
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
<div id="gallery">
<table>
	<tr>
		<td align="center">Skill Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<?php
			if(isset($_REQUEST['cid']))
			{
				$c=$_REQUEST['cid'];
			}	
			if(isset($_REQUEST['sid']))
			{
				$s=$_REQUEST['sid'];
			}
			if(isset($_REQUEST['skid']))
			{
				$sk=$_REQUEST['skid'];
			}
 		 	$result1=mysql_query("select * from subcatetbl where sub_id=".$s,$con)or die("Error In Select Query sub2");
		  	if(mysql_num_rows($result1))
			{
				while($r1=mysql_fetch_array($result1))
				{?>
		<td align="left" colspan="2">&nbsp;<a href="AddNewSkill.php?sid=<?php echo $r1[0];?>&amp; cid=<?php echo $r1[2];?>">Add New Skill</a></td>
	</tr>
			<?php
			}
			}
			if(isset($_REQUEST['cid']))
				{
					
			  		$c=$_REQUEST['cid'];
				}
			if(isset($_REQUEST['sid']))
				{
					
			  		$s=$_REQUEST['sid'];
				}
			
 		 $result2=mysql_query("select * from skilltbl where sub_id=".$s."&& cate_id=".$c,$con)or die("Error In Select Query sub");
		 
			   if(mysql_num_rows($result2))
			   {
			   	while($r2=mysql_fetch_array($result2))
				{?>
				 
				<tr>
					<td align="left"><?php echo $r2[1];?></td>
					<td align="center" style="padding:5px;"><a href="editskill.php?skid=<?php echo $r2[0];?> &amp; sid=<?php echo $r2[3]; ?> &amp; cid=<?php echo $r2[2]; ?>"> Edit </a></td>
					<td align="center" style="padding:5px;"><a href="delskill.php?skid=<?php echo $r2[0];?> &amp; sid=<?php echo $r2[3]; ?> &amp; cid=<?php echo $r2[2];?>"> Delete </a></td>
				</tr>
	
			<?php
			}
			}
			?>
					</table>
					<?php
include("footer.php");
?>