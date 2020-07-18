<?php
session_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
if(isset($_POST['submit']))
{
	mysql_query("insert into employee_acc (employee_id,name,ac_no) values ('$eid','".$_POST['name1']."','".$_POST['ac_no']."')")or die("Error");
	header("location:employee_home.php");
}
?>
<script src="jquery-1.9.0.min.js"></script>
<script>
function ValidateAcc()
{
 var form = document.getElementById("form1"); 
 var nm_err = document.getElementById("nm_err");
 var no_err = document.getElementById("no_err");

 var name1 = form["name1"].value;
 var ac_no = form["ac_no"].value;
 
 cnt=0;
 <!-- name validation -->
 if(name1=="")
 {
 	nm_err.innerHTML="* Plz...Enter the Name";
	cnt++;
 }
 else if(name1.search(/^[A-Za-z]+$/)==-1)
 {
	nm_err.innerHTML="* Plz...Enter the only Alphabets";
	cnt++;
 }
 else
 {
	nm_err.innerHTML="";
 }

 <!-- Account number validatoion-->
 if(ac_no == "")
 {
 	no_err.innerHTML=" * Plz... Enter your Account number";
	cnt++;
 }
 else if(ac_no.search(/^\d{14}$/) == -1)
 {
 	no_err.innerHTML=" * Plz... Enter valid Account number";
	cnt++;
 }
 else
 {
 	no_err.innerHTML="";
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

<div id="tooplate_middle">
	<div id="mid_title">Account Details</div>
	<div class="cleaner"></div>
</div> 
<!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<form name="form1" id="form1" method="POST">
	<caption><u><b>Account Details</b></u></caption>
	<table width="60%">
	<tr><td>Name</td>
		<td>:</td>
		<td><input type="text" name="name1"/></td>
		<td id="nm_err" style="color:#993300; font-style:italic;">*</td></tr>
	<tr><td>Account Number</td><td>:</td>
	<td><input type="text" id="ac_no" name="ac_no"/></td>
	<td id="no_err" style="color:#993300; font-style:italic;">*</td></tr>
	<tr><td></td><td></td><td><input type="submit" name="submit" value="Submit" onclick="javascript:return ValidateAcc();"/></td></tr>
	</table>
	</form>
	<?php 
	include("footer.php");
	?>