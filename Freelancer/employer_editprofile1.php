<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$e_id=$_SESSION['employer_id'];

if(isset($_POST['save']))
{
	if($_FILES['image']['tmp_name']!="")
	{
	 $a=session_id();
	 $b=str_shuffle($a);
	 $f1=explode(".",$_FILES["image"]["name"]);
	 $img=$b.".".$f1[1];
	 move_uploaded_file($_FILES['image']['tmp_name'],"UserImages/".$img)or die(mysql_error());		
	}
	else
	{
		$img=$_POST['imgnm'];
	}
 $result=mysql_query("update employer_regitbl set fn='".$_POST['fn']."',ln='".$_POST['ln']."',em='".$_POST['email']."',un='".$_POST['un']."',cnm='".$_POST['cnm']."',cadd='".$_POST['cadd']."',cem='".$_POST['cem']."',cn1='".$_POST['cn']."',city='".$_POST['city']."',img_upld='$img' where employer_id=".$_SESSION['employer_id'],$con)or die("Error In Update Query");

 header("location:employer_editprofile.php");
}
?>
<script src="jquery-1.9.0.min.js"></script>
<script>
function Validateprofile()
{
 var form = document.getElementById("form1");
 
 var fn_err = document.getElementById("fn_err");
 var ln_err = document.getElementById("ln_err");
 var em_err = document.getElementById("em_err");
 var un_err = document.getElementById("un_err");
 var cnm_err = document.getElementById("cnm_err");
 var cadd_err = document.getElementById("cadd_err");
 var cem_err = document.getElementById("cem_err");
 var cn1_err = document.getElementById("cn1_err");
 var city_err = document.getElementById("city_err");
 var img_err = document.getElementById("img_err");
 
 var fn = form["fn"].value;
 var ln = form["ln"].value;
 var email = form["email"].value;
 var un = form["un"].value;
 var cnm = form["cnm"].value;
 var cadd = form["cadd"].value;
 var cem = form["cem"].value;
 var cn1 = form["cn1"].value;
 var city = form["city"].value; 
 
 cnt=0;
 <!-- first name validation -->
 if(fn == "")
 {
 	fn_err.innerHTML = " * Plz... Enter the text character";
	cnt++;
 }
 else if(fn.search(/^[A-Za-z]+$/) == -1)
 {
 	fn_err.innerHTML = " * Plz... Enter only text character";
	cnt++;
 }
 else
 {
 	fn_err.innerHTML = "";
 }
 <!-- last name validation -->
 if(ln == "")
 {
 	ln_err.innerHTML = " * Plz... Enter the text character";
	cnt++;
 }
 else if(ln.search(/^[A-Za-z]+$/) == -1)
 {
 	ln_err.innerHTML = " * Plz... Enter only text character";
	cnt++;
 }
 else
 {
 	ln_err.innerHTML = "";
 }
 <!-- email validation -->
 if(email == "")
 {
 	em_err.innerHTML = " * Plz... Enter the Email Address ";
	cnt++;
 }
 else if(email.search(/^[A-Za-z0-9._]+@[A-Za-z]+\.[A-Za-z]{2,4}$/i) == -1)
 {
 	em_err.innerHTML = " * Plz... Enter valid Email Address ";
	cnt++;
 }
 else
 {
 	em_err.innerHTML = "";
 }
 <!-- username validation -->
 if(un=="")
 {
 	un_err.innerHTML="* Plz...Enter the user name";
	cnt++;
 }
 else if(un.search(/^[\w.-]+$/)==-1)
 {
	un_err.innerHTML="* Plz...Enter the only letters,digits and the underscore";
	cnt++;
 }
 else
 {
	un_err.innerHTML="";
 }
 <!-- company name validatoion-->
 if(cnm.search(/^[A-Za-z]+$/) == -1)
 {
 	cnm_err.innerHTML = " * Plz... Enter only text character";
	cnt++;
 }
 else
 {
 	cnm_err.innerHTML = "";
 }
  <!-- city validatoion-->
 if(city == "")
 {
 	city_err.innerHTML=" * Plz... Enter your city name";
	cnt++;
 }
 else
 {
 	city_err.innerHTML="";
 }
 <!-- contact number validatoion-->
 if(cn1 == "")
 {
 	cn1_err.innerHTML=" * Plz... Enter your contact number";
	cnt++;
 }
 else if(cn1.search(/^\d{10}$/) == -1)
 {
 	cn1_err.innerHTML=" * Plz... Enter valid mobile number";
	cnt++;
 }
 else
 {
 	cn1_err.innerHTML="";
 }
 
if(image == "")
{
	//img_err.innerHTML=" * Plz... Upload an Image";
	//cnt++;
}
else
{
	var img = $("#imgnm").val();
 
	var exts = ['jpg','jpeg','png','gif', 'bmp'];
	// split file name at dot
	var get_ext = img.split('.');
	// reverse name to check extension
	get_ext = get_ext.reverse();
 
	if (img.length > 0 )
	{
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 )
		{
		  return true;
		} 
		else 
		{
			 //alert("Upload only jpg, jpeg, png, gif, bmp images");
			//return false;
			img_err.innerHTML=" * Plz... Upload only jpg, jpeg, png, gif, bmp images";
			cnt++;
		}			
	} 
	else 
	{
		alert("please upload an image");
		return false;
	}
	return false;
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
	<div id="mid_title">Edit Profile</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 
		  <?php	
			  $result=mysql_query("select * from employer_regitbl where employer_id=".$e_id,$con)or die("Error In Select Query");
			   if(mysql_num_rows($result))
			   {
			   	while($r=mysql_fetch_array($result))
				{?>
		 	
				
                <form id="form1" name="form1" method="post" onsubmit = "Validateprofile();" enctype="multipart/form-data">
		 <table border="0">
			<tr>
			 	<td>First Name:</td>
			 	<td><label><input id="fn" type="text" name="fn" value="<?php echo $r[1]; ?>"></label></td>
				<td id="fn_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Last Name:</td>
			 	<td><label><input id="ln" type="text" name="ln" value="<?php echo $r[2]; ?>"></label></td>
				<td id="ln_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Email:</td>
			 	<td><label><input id="email" type="text" name="email"  value="<?php echo $r[3]; ?>" ></label></td>
				<td id="em_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>User Name:</td>
			 	<td><label><input id="un" type="text" name="un"  value="<?php echo $r[4]; ?>" required="required"></label></td>
				<td id="un_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Company Name:</td>
			 	<td><label><input id="cnm" type="text" name="cnm"  value="<?php echo $r[6]; ?>" required="required"></label></td>
				<td id="cnm_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Company Address:</td>
			 	<td><label><textarea id="cadd" type="text" name="cadd" value="<?php echo $r[7]; ?>"><?php echo $r[7]; ?></textarea></label></td>
				<td></td>
			</tr>
			<tr>
			 	<td>Company Email:</td>
			 	<td><label><input id="cem" type="text" name="cem" value="<?php echo $r[8];?>"  ></label></td>
				<td id="cem_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
				<td>Contact No:</td>
			 	<td><label><input id="cn" type="text" name="cn" value="<?php echo $r[9];?>"></label></td>
				<td id="cn_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>city:</td>
			 	<td><label><input id="city" type="text" name="city" value="<?php echo $r[10];?>" ></label></td>
				<td id="city_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Image:</td>
			 	<td><label>
				<img src="UserImages/<?php echo $r[14];?>" height="90" width="90" />
				<input type="file" name="image">
				<input type="hidden" name="imgnm" value="<?php echo $r[14];?>" >
				</label></td>
				
				<td id="img_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
				<td></td>
				<td><label><br />
						<input type = "submit" name = "save" value = "Save" onclick = "javascript:return Validateprofile();"/>
				</label></td>
			</tr>
	
		</table>
	</form>
	<?php 
	}
	}
	include("footer.php"); 
?>
