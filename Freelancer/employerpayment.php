<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
	$eid=$_SESSION['employer_id'];
	$em= $_SESSION['em'];
if(isset($_POST['submit']))
{
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
				
	mysql_query("insert into employerpaytbl (p_id,amount,employer_id,employee_id) values ($p,'".$_POST['budget']."','$eid','".$_POST['e_id']."')")or die("Error1");
	mysql_query("delete from completeprj where p_id=".$p)or die("Error");
	
	header("location:employer_home.php");
	}
	?>
	<div id="tooplate_middle">
	<div id="mid_title">Payment</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	
	
	<?php 
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
				if(isset($_REQUEST['cid']))
				{		$c=$_REQUEST['cid'];
				}
	 ?>
	 <form method="POST">
	<table width="100%" border="2">
		<?php 
		$result2=mysql_query("select employee_id,budget from completeprj where completeprj_id=".$c,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result2)>0)
	{
		while($r2=mysql_fetch_array($result2))
		{
		$result1=mysql_query("select un from employee_regitbl where employee_id=".$r2[0],$con)or die("Error in Select Query2");
	if(mysql_num_rows($result1)>0)
	{
		while($r1=mysql_fetch_array($result1))
		{	
		
	 ?>
	<tr><td>Employee Name</td><td align="center" width="10px">:</td>
		<td>
		<input type="hidden" name="e_id" value="<?php echo $r2[0];?>" readonly="readonly">
		<input type="text" name="un" value="<?php echo $r1[0];?>" readonly="readonly"></td>
	</tr>
	<tr><td>Budget</td><td align="center" width="10px">:</td>
		
	
		
		<td><input type="text" name="budget" value="<?php echo $r2[1];?>"readonly="readonly"></td>
		
	</tr>
		<?php } } }
	}?>
	<?php ?>
	</table>
	<table width="100%">
	<tr><td width="40%"></td><td align="center"></td>
	<td align="left"><input type="submit" name="submit" value="Pay"/></td></tr>
	</table>
	</form>
	
	<?php
	include("footer.php");
	?>