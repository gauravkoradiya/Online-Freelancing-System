<?php
session_start();
include("header.php");
include("Config.php");
if(isset($_POST['btnsave']))
{ 		
if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				} 
	$result=mysql_query("insert into subcatetbl(sub_name,cate_id) values('".$_POST['sub_name']."' , '".$_POST['cate_id']."')",$con)or die("Error In Insert Query");
header("location:viewsubcategory.php?cid=".$c);
}
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
		 <form id="AddsubCategoryForm" action="" method="post">
		 	<table>  
				<tr>
			 		<td align="center">SubCategory Name:</td>
			 		<td align="center"><label><input type="text" id="sub_name" name="sub_name" required="required"/></label></td>
				</tr>
				<?php
				if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				}	 
				$result=mysql_query("select cate_id from catetbl where cate_id=".$c,$con)or die("Error In Select Query");
				if(mysql_num_rows($result))
				{
					while($r=mysql_fetch_array($result))
					{
				?>  
				<tr>
			 		<td align="center"><label><input type="hidden" value="<?php echo $r[0];?>" id="cate_id" name="cate_id" readonly/></label></td>
				</tr>
				<?php 
					} 
				}
				?>
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