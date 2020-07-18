<?php 
session_start();
ob_start();
include("config.php");
include("header.php");

 ?>
<div id="tooplate_middle">
	<div id="mid_title">WelCome <?php echo $_SESSION['unm'];?></div>

<a href="Reports.php"><b>Reports</b></a>	<div class="cleaner"></div>
</div> <!-- end of middle -->
<div id="tooplate_main_top"></div>

<div id="tooplate_main">
	<div id="gallery">
<br><br><br>

<center>
		<font color="#0B0B3B" size="7"> Admin report</font><br><br><br>
		<table>
		<tr>
<?php 
	$result=mysql_query("Select count(*) As Cnt From catetbl");
	$res=mysql_fetch_assoc($result);
?>
<b><li><a href="ReportCate.php">Report Category Information &nbsp;&nbsp;&nbsp;<?php echo $res['Cnt']; ?> </b></a></li>	
</tr>
<tr>
<?php 
	$result=mysql_query("Select count(*) As Cnt From subcatetbl");
	$res=mysql_fetch_assoc($result);
?>
<b> <li><a href="ReportSub.php">Report SubCategory Information &nbsp;&nbsp;&nbsp;<?php echo $res['Cnt']; ?> </b>	</a></li>
</tr>
<tr>
<?php 
	$result=mysql_query("Select count(*) As Cnt From skilltbl");
	$res=mysql_fetch_assoc($result);
?>
<b> <li><a href="Reportskill.php">Report Skill Information &nbsp;&nbsp;&nbsp;<?php echo $res['Cnt']; ?> </b>	</a></li>
</tr>
<tr>
<?php 
	$result=mysql_query("Select count(*) As Cnt From employer_regitbl");
	$res=mysql_fetch_assoc($result);
?>
<b> <li><a href="Reportemployer.php">Report Total Register Employer &nbsp;&nbsp;&nbsp;<?php echo $res['Cnt']; ?> </b>	</a></li>
</tr>
<tr>
<?php 
	$result=mysql_query("Select count(*) As Cnt From employee_regitbl");
	$res=mysql_fetch_assoc($result);
?>
<b><li><a href="Reportemployee.php">Report Total Register Employee &nbsp;&nbsp;&nbsp;<?php echo $res['Cnt']; ?> </b></a></li>	
</tr>
<tr>
<?php 
	$result=mysql_query("Select count(*) As Cnt From prjtbl");
	$res=mysql_fetch_assoc($result);
?>
<b><li><a href="Reportproject.php">Report Total Post Project &nbsp;&nbsp;&nbsp;<?php echo $res['Cnt']; ?> </b></a></li>	
</tr>
</table>
								
								
								
									
								
									
								
		</center>
	<?php
include("footer.php"); 
?>