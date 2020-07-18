<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$f=0;
	$eid= $_SESSION['employee_id'];
	 if(isset($_POST["submit"]))
	{
		if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				} 
				if(isset($_REQUEST['bid']))
				{		$b=$_REQUEST['bid'];
				} 
		mysql_query("update bidtbl set budget='".$_POST['b1']."',days='".$_POST['d1']."',date=now() where project_id='".$p."'AND bid_id=".$b)or die("Error");
		header("location:employeebidprjview.php?bid=".$b."& pid=".$p);
	}
?>
<div id="tooplate_middle">
	<div id="mid_title">Edit Biding</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<form method="Post">
<table width="50%">
	
	<?php
			if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				} 
				if(isset($_REQUEST['bid']))
				{		$b=$_REQUEST['bid'];
				}
				$result=mysql_query("select * from prjtbl where p_id= ".$p,$con)or die("Error in Select Query");
						
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
			<tr><td>Project Title</td><td>:</td><td align="left"><?php echo $r[2]; ?></td></tr>
			<tr><td>Details</td><td>:</td><td align="left"><?php echo $r[5]; ?></td></tr>
						<?php 
						$res2=mysql_query("select * from bidtbl where project_id=".$p." && bid_id=".$b,$con)or die("Error");
						if(mysql_num_rows($res2)>0)
				{
					while($r3=mysql_fetch_array($res2))
					{ 
						?>
			<tr><td>Your Budget</td><td>:</td><td align="left"><input type="text" name="b1" value="<?php echo $r3[3]; ?>" required="required"></td></tr>
						<tr><td>Days</td><td>:</td><td align="left"><input type="text" name="d1" value="<?php echo $r3[4]; ?>" required="required"></td></tr>
						<tr><td>Date of Biding</td><td>:</td><td align="left"><?php echo $r3[7]; ?></td></tr>
				<?php } } ?>
						<?php 
						$res1=mysql_query("select * from employer_regitbl where employer_id=".$r[1]);
						if(mysql_num_rows($res1)>0)
				{
					while($r2=mysql_fetch_array($res1))
					{ 
						?>
						<td>Posted by</td><td>:</td><td align="left"><?php echo $r2[4]; ?></td></tr>
				<?php } } ?>
					
						
				<?php	}
						}
						
				?>
				<tr><td></td><td></td><td><input type="submit" value="Update" name="submit"/></td></tr>
				</table>
	</form>
	<?php
include("footer.php"); 
?>