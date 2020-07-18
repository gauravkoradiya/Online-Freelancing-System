<?php
session_start();
ob_start();
ob_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
	
if(isset($_POST['submit']))
{
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
		$a=session_id();
			$b=str_shuffle($a);
			$f1=explode(".",$_FILES["file1"]["name"]);
			$file2=$b.".".$f1[1];
			move_uploaded_file($_FILES['file1']['tmp_name'],"UserCompleteProject/".$file2)or die("error");
			
			mysql_query("insert into completeprj(p_id,employee_id,employer_id,budget,prjfile,complete_date) values ('$p','$eid','".$_POST['e_id']."','".$_POST['budget']."','$file2',now())") or die("Error in insert");
			mysql_query("Delete from prj_allocated where p_id=".$p,$con)or die("Error In Delete Query");

			header("Location:employee_home.php");
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Project Detail</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<?php
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
?>
<form method="post"  enctype="multipart/form-data">
	<table width="100%" border="2">				
	<?php
	$result=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result)>0)
	{
		while($r=mysql_fetch_array($result))
		{ 
	?>
	<tr>
		<td>Project Name</td>
		<td align="center" width="10%">:</td>
		<td align="left"><?php echo $r[2]; ?></td></tr>
						<tr><td>Details</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[5]; ?></td></tr>
						<?php 
						$res=mysql_query("select * from employer_regitbl where employer_id=".$r[1]);
						if(mysql_num_rows($res)>0)
				{
					while($r1=mysql_fetch_array($res))
					{ 
						?>
						<tr><td>Posted by</td><td align="center" width="10%">:</td><td align="left"><input type="hidden" name="e_id" value="<?php echo $r1[0];?>" /><?php echo $r1[4]; ?></td></tr>
				<?php } } ?>
						<?php 
						$res1=mysql_query("select * from prj_allocated where p_id=".$p);
						if(mysql_num_rows($res1)>0)
				{
					while($r2=mysql_fetch_array($res1))
					{ 
						?>
						
						<tr><td>Budget</td><td align="center" width="10%">:</td> <td align="left">
						<input type="hidden" name="budget" value="<?php echo $r2[2]; ?>"/><?php echo $r2[2]; ?></td></tr>
						
						<tr><td>Date of Allocated</td><td align="center" width="10%">:</td><td align="left"><?php echo $r2[5]; ?></td></tr>
				<?php	
					}
				}
				}
				}
				?>
				
				<tr><td></td><td></td><td><input type="hidden" name="pid" value="<?php echo $p;?>" /></td></tr>
				</table>
				If Your Project is Done Please Attach File...
				<table>
				<tr>
				<tr>
			 	<td><input id="file1" required="required" type="file" name="file1" ></label></td>
				</tr>
				<tr><td><input type="submit" value="Submit" name="submit"></td></tr>
				</table>
				</form>
<?php
include("footer.php");
?>