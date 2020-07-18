<?php
session_start();
include("header.php");
include("Config.php");
if($_POST["btnsave"])
{
	$result=mysql_query("insert into catetbl(cate_name) values('".$_POST['cate_name']."')",$con)or die("Error In Insert Query");
	header("location:category.php");
}
?>

<div id="tooplate_middle">
	<div id="mid_title">Add New Category</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 <form id="AddCategoryForm" name="AddCategoryForm" method="post">
		 	<table>  
				<tr>
			 		<td align="center">Category Name:</td>
			 		<td align="center"><label><input type="text" id="cate_name" name="cate_name" required/></label></td>
				</tr>
                <tr>
					<td></td>
					<td align="left"><label><br />
						<input type = "submit" id="btnsave" name = "btnsave" value = "Save" onclick = "javascript:return ValidateCateName();" />
					</label></td><td></td>
				</tr>    
            </table>
        </form>
<?php
include("footer.php"); 
?>
