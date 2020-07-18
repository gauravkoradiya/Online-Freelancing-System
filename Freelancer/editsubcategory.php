<?php
session_start();
include("header.php");
include("Config.php");
if(isset($_POST['btnsave']))
{
 $result=mysql_query("update subcatetbl set sub_name='".$_POST['sub_name']."' where sub_id=".$_REQUEST['sid'],$con)or die("Error In Update Query");
	if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				} 
header("location:viewsubcategory.php?cid=".$c);
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Edit SubCategory</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 <form id="EditSubCategoryForm" action="" method="post">
		  <?php
			  	if(isset($_REQUEST['sid']))
				{
					
			  		$s=$_REQUEST['sid'];
				}	
			   $result=mysql_query("select sub_name from subcatetbl where sub_id=".$s,$con)or die("Error In Select Query");
			   if(mysql_num_rows($result))
			   {
			   	while($r=mysql_fetch_array($result))
				{?>
		 	<table>  
				<tr>
			 		<td align="center">SubCategory Name:</td>
			 		<td align="center"><label><input type="text" value="<?php echo $r[0];?>" id="sub_name" name="sub_name" required="required"/></label></td>
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
