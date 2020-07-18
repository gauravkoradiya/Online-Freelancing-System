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
$result=mysql_query("Select cate_name from catetbl where cate_id=".$c,$con) or die("Error In Select Query1");
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
		<td align="center">SubCategory Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<?php
			if(isset($_REQUEST['cid']))
			{
				$c=$_REQUEST['cid'];
			}	
 		 	$result=mysql_query("select * from catetbl where cate_id=".$c,$con)or die("Error In Select Query sub");
		  	if(mysql_num_rows($result))
			{
				while($r=mysql_fetch_array($result))
				{?>
		<td align="left" colspan="2">&nbsp;<a href="AddNewSubCategory.php?cid=<?php echo $r[0];?>">Add New SubCategory</a></td>
	</tr>
			<?php
			}
			}
		
			if(isset($_REQUEST['cid']))
				{
					
			  		$c=$_REQUEST['cid'];
				}	
 		 $result1=mysql_query("select * from subcatetbl where cate_id=".$c,$con)or die("Error In Select Query sub");
		 
			   if(mysql_num_rows($result1))
			   {
			   	while($r1=mysql_fetch_array($result1))
				{?>
				 
				<tr>
					<td align="left"><?php echo $r1[1];?></td>
					<td align="center" style="padding:5px;"><a href="editsubcategory.php?sid=<?php echo $r1[0];?> &amp; cid=<?php echo $r1[2]; ?>"> Edit </a></td>
					<td align="center" style="padding:5px;"><a href="delsubcategory.php?sid=<?php echo $r1[0];?> &amp; cid=<?php echo $r1[2];?>"> Delete </a></td>
					<td align="center" style="padding:5px;"><a href="viewskill.php?sid=<?php echo $r1[0];?> &amp; cid=<?php echo $r1[2];?>">View Skill</a></td>
				</tr>
	
			<?php
			}
			}
			?>
					</table>
					<?php
include("footer.php");
?>