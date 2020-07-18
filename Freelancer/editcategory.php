<?php
session_start();
include("header.php");
include("Config.php");
if(isset($_POST['btnsave']))
{
 $result=mysql_query("update catetbl set cate_name='".$_POST['cate_name']."' where cate_id=".$_REQUEST['cid'],$con)or die("Error In Update Query");

 header("location:category.php");
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Edit Category</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 <form id="EditCategoryForm" action="" method="post">
		  <?php
			  	if(isset($_REQUEST['cid']))
				{
					
			  		$c=$_REQUEST['cid'];
				}	
			   $result=mysql_query("select cate_name from catetbl where cate_id=".$c,$con)or die("Error In Select Query");
			   if(mysql_num_rows($result))
			   {
			   	while($r=mysql_fetch_array($result))
				{?>
		 	<table>  
				<tr>
			 		<td align="center">Category Name:</td>
			 		<td align="center"><label><input type="text" value="<?php echo $r[0];?>" id="cate_name" name="cate_name" required="required"/></label></td>
				</tr>
				<?php } }?>
                <tr>
					<td></td>
					<td align="left"><label><br />
						<input type = "submit" name = "btnsave" value = "Save" />
					</label></td>
				</tr>    
                  </table>
              </form>

<?php
	include("footer.php"); 
?>
