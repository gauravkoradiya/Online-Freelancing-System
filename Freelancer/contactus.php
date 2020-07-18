<?php
ob_start();
include("header.php");
include("config.php");
if(isset($_POST["submit"]))
	{
			mysql_query("insert into contactustbl(email,subject,msg)values('".$_POST['email']."','".$_POST['subject']."','".$_POST['message']."')");
			header("Location:defaulthome1.php");
	}
 ?>
 <div id="tooplate_middle">
	<div id="mid_title">Contact Us</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<form id="contact_form" name="contact_form" action="" method="POST">
	<table>
	<tr><td>Your Email:</td></tr>
	<tr><td><input id="email" name="email" type="text" value="" size="30" required="required"/></td>
	<td id="email_err" style="color:#993300; font-style:italic;">*</td></tr>
	<tr><td>Subject:</td></tr>
	<tr><td><input id="subject" name="subject" type="text" value="" size="30" required="required"/></td>
	<td id="subject_err" style="color:#993300; font-style:italic;">*</td></tr>
	<tr><td>message:</td></tr>
	<tr><td><textarea id="message" name="message" rows="7" cols="30" required="required"></textarea></td>
	<td id="message_err" style="color:#993300; font-style:italic;">*</td></tr>
	<tr><td><input id="submit" type="submit" name="submit" value="Submit" onclick="javascript:return Validate1();" /></td></tr>
	</table>
	</form>						
 <?php include("footer.php"); ?>
<script src="jquery-1.9.0.min.js"></script>
<script>
 // JavaScript Document
function Validate1()
{
 var form = document.getElementById("contact_form");
 
 var email_err = document.getElementById("email_err");
 var subject_err = document.getElementById("subject_err");
 var message_err = document.getElementById("message_err");
 
 
 
 var email = form["email"].value;
 var subject = form["subject"].value;
 var message = form["message"].value;
 
 cnt=0;
 
 <!-- Subject validation -->
 if(subject == "")
 {
 	subject_err.innerHTML = " * Plz... Enter the text character";
	cnt++;
 }
 else if(subject.search(/^[A-Za-z]+$/) == -1)
 {
 	subject_err.innerHTML = " * Plz... Enter only text character";
	cnt++;
 }
 else
 {
 	subject_err.innerHTML = "";
 }
 <!-- email validation -->
 if(email == "")
 {
 	email_err.innerHTML = " * Plz... Enter the Email Address ";
	cnt++;
 }
 else if(email.search(/^[A-Za-z0-9._]+@[A-Za-z]+\.[A-Za-z]{2,4}$/i) == -1)
 {
 	email_err.innerHTML = " * Plz... Enter valid Email Address ";
	cnt++;
 }
 else
 {
 	email_err.innerHTML = "";
 }
  <!--Message validatoion-->
 if(message == "")
 {
 	message_err.innerHTML=" * Plz... Enter your Message";
	cnt++;
 }
 else
 {
 	message_err.innerHTML="";
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
}</script>