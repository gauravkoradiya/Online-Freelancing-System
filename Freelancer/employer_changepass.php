<?php
session_start();
include("header.php");
include("config.php");
if(count($_POST)>0) 
{
$result = mysql_query("SELECT pass from employer_regitbl WHERE employer_id='" . $_SESSION["employer_id"] . "'")or die(mysql_error());
$row=mysql_fetch_array($result);
if($_POST["currentPassword"] == $row["pass"]) 
{
mysql_query("UPDATE employer_regitbl set pass='" . $_POST["newPassword"] . "' WHERE employer_id='" . $_SESSION["employer_id"] . "'")or die(mysql_error());
$message = "<center><b>Password Changed</b></center>";
} 
else $message = "<center><b>Current Password is not correct</b></center>";
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Change Password</div>
	<div class="cleaner"></div>
</div> 
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body>
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2"></td>
</tr>
<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>
<?php
include("footer.php");
?>