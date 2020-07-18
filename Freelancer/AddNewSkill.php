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
if(isset($_REQUEST['sid']))
				{
					$s=$_REQUEST['sid'];
				}
if(isset($_REQUEST['skid']))
				{
					$sk=$_REQUEST['skid'];
				}				
	$result=mysql_query("insert into skilltbl(skill_name,sub_id,cate_id) values('".$_POST['skill_name']."' , '".$_POST['sub_id']."' , '".$_POST['cate_id']."')",$con)or die("Error In Insert Query");
$v="viewskill.php";
header("location:$v?cid=$c& sid=$s");
	}
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
		 <form id="AddskillForm" action="" method="post">
		 	<table>  
				<tr>
			 		<td align="center">Skill Name:</td>
			 		<td align="center"><label><input type="text" id="skill_name" name="skill_name" required="required"/></label></td>
				</tr>
				<?php
				if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				} 
				if(isset($_REQUEST['sid']))
				{
					$s=$_REQUEST['sid'];
				} 	 
				$result=mysql_query("select sub_id,cate_id from subcatetbl where sub_id=".$s."&& cate_id=".$c,$con)or die("Error In Select Query");
				if(mysql_num_rows($result))
				{
					while($r=mysql_fetch_array($result))
					{
				?>  
				<tr>
			 		<td align="center"><label><input type="hidden" value="<?php echo $r[0];?>" id="sub_id" name="sub_id" readonly/></label></td>
					<td align="center"><label><input type="hidden" value="<?php echo $r[1];?>" id="cate_id" name="cate_id" readonly/></label></td>
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