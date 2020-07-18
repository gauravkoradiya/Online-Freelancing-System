<?php
session_start();
include("header.php");
include("Config.php");
?>
<div id="tooplate_middle">
	<div id="mid_title">Category</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery"> 
 <table>
			  	<tr>
					<td align="center">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td align="center" colspan="3"><a href="AddCategory.php">Add New Category</a></td>
				</tr>
				<?php
				$result=mysql_query("select * from catetbl",$con)or die("Error in Select Query");
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
				<tr>
					<td align="left" style="padding:5px;"><?php  echo $r[1];?>	</td>
					<td align="center" style="padding:5px;"><a href="editcategory.php?cid=<?php echo $r[0];?>"> Edit </a></td>
					<td align="center" style="padding:5px;"><a href="delcategory.php?cid=<?php echo $r[0];?>"> Delete </a></td>
					<td align="center" style="padding:5px;"><a href="viewsubcategory.php?cid=<?php echo $r[0];?>"> View SubCategory </a></td>
				</tr>
				
				<?php } } ?>
			  </table>

<?php
include("footer.php");
?>