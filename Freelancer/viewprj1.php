<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
 if(isset($_POST["submit"]))
	{
		
			
					mysql_query("insert into bidtbl(employee_id,project_id,budget,days,employer_id,status,date)values('$eid','".$_POST['pid']."','".$_POST['budget']."','".$_POST['d1']."','".$_POST['e_id']."','',now())")or die("Error");
			header("location:bidprj.php");
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
	
				
				<form name="form1" id="form1" method="post">
	<table width="100%" border="2">				<?php
		
				$result=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
				
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
				
						<tr>
						<td>Project Name</td><td align="center" width="10%">:</td>
						<td align="left"><?php echo $r[2]; ?></td></tr>
						<tr><td>Details</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[5]; ?></td></tr>
						<tr><td>Budget</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[6]; ?></td></tr>
						<?php 
						$res1=mysql_query("select * from skilltbl where skill_id=".$r[4]);
						if(mysql_num_rows($res1)>0)
				{
					while($r2=mysql_fetch_array($res1))
					{ 
						?>
						<tr><td>Skill</td><td align="center" width="10%">:</td><td align="left"><input type="hidden" name="e_id" value="<?php echo $r2[0];?>" /><?php echo $r2[1]; ?></td></tr>
				<?php } } ?>
						
						
						<tr><td>Days to Complete</td><td align="center" width="10%">:</td> <td align="left"><?php echo $r[7]; ?></td></tr>
						<?php 
						$res=mysql_query("select * from employer_regitbl where employer_id=".$r[1]);
						if(mysql_num_rows($res)>0)
				{
					while($r1=mysql_fetch_array($res))
					{ 
						?>
						<tr><td>Posted by</td><td align="center" width="10%">:</td><td align="left"><input type="hidden" name="e_id" value="<?php echo $r1[0];?>" /><?php echo $r1[4]; ?></td></tr>
				<?php } } ?>
						<tr><td>Date of Posted</td><td align="center" width="10%">:</td><td align="left"><?php echo $r[9]; ?></td></tr>
				<tr><td>Required file</td><td align="center" width="10%">:</td>
				<td align="left"><a href="UserFiles/<?php echo $row['$r[8]'] ?>" target="_blank">view file</a></td></tr>
				<?php	
					}
				}
				?>
				
				<tr><td></td><td></td><td><input type="hidden" name="pid" value="<?php echo $p;?>" /></td></tr>
				</table>
				<br/>
				<table>

				<tr><td>Your Budget</td><td>:</td>
				<td>
				<input type="text" name="budget" id="budget" required="required" />
	
     
				</td>
				<td id="bud_err" style="color:#993300; font-style:italic;">*</td></tr>
				<tr><td>Days</td><td>:</td>
				<td><input type="text" name="d1" id="d1" required="required"/></td>
				<td id="day_err" style="color:#993300; font-style:italic;">*</td></tr>
				<tr><td></td><td></td><td><input type="submit" name="submit" value="Bid Now" onclick="javascript:return validatebud();"/></td></tr>
				</table>

				</form>
<?php 

include("footer.php");
?>
<script src="jquery-1.9.0.min.js"></script>
<script>
function validatebud()
{
 var form = document.getElementById("form1");
 
 var bud_err = document.getElementById("bud_err");
  var day_err = document.getElementById("day_err");
  
 var budget = form["budget"].value;
 var d1 = form["d1"].value;

 
 cnt=0;
 <!-- Budget validatoion-->
 if(budget == "")
 {
 	bud_err.innerHTML=" * Plz... Enter your Budget";
	cnt++;
 }
 else if(budget.search(/^\d+$/) == -1)
 {
 	bud_err.innerHTML=" * Plz... Enter budget in Digits"; 
	cnt++;
 }
 else
 {
 	bud_err.innerHTML="";
 }

 <!-- day validatoion-->
 if(d1 == "")
 {
 	day_err.innerHTML=" * Plz... Enter your days";
	cnt++;
 }
 else if(d1.search(/^\d+$/) == -1)
 {
 	day_err.innerHTML=" * Plz... Enter Days in Digits";
	cnt++;
 }
 else
 {
 	day_err.innerHTML="";
 }	
 if(cnt>0)
 {
	alert("Please fill form data correctly");
	cnt=0;
	return false;
 }
 else
 {
	return true;
 }
}
</script>