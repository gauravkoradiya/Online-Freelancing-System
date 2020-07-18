<?php
	session_start();
	ob_start();
	include("header.php");
	include("config.php");
	if(isset($_POST["submit"]))
	{
			$a=session_id();
			$b=str_shuffle($a);
			$f1=explode(".",$_FILES["image"]["name"]);
			$img=$b.".".$f1[1];
			move_uploaded_file($_FILES['image']['tmp_name'],"UserImages/".$img)or die("error");
		
			mysql_query("insert into employee_regitbl(fn,ln,em,un,pass,cn1,cn2,address,city,que,ans,balance,img_upld)values('".$_POST['fn']."','".$_POST['ln']."','".$_POST['email']."','".$_POST['un']."','".$_POST['pass']."','".$_POST['cn1']."','".$_POST['cn2']."','".$_POST['address']."','".$_POST['city']."','".$_POST['que']."','".$_POST['ans']."',0,'$img')");
			header("Location:employee_login.php");
		
	}
?>
<script src="jquery-1.9.0.min.js"></script>
<script>
function validateImage() {
	var img = $("#image").val();
 
	var exts = ['jpg','jpeg','png','gif', 'bmp'];
	// split file name at dot
	var get_ext = img.split('.');
	// reverse name to check extension
	get_ext = get_ext.reverse();
 
	if (img.length > 0 ) {
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		  return true;
		} else {
			 alert("Upload only jpg, jpeg, png, gif, bmp images");
			return false;
		}			
	} else {
		alert("please upload an image");
		return false;
	}
	return false;
}
</script>
<div id="tooplate_middle">
	<div id="mid_title">Employee Registration</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<form id="form1" name="form1" method="post" enctype="multipart/form-data" onsubmit="validateImage();"> 
		 <table border="0">
			<tr>
			 	<td>First Name:</td>
			 	<td><label><input id="fn" type="text" name="fn" ></label></td>
				<td id="fn_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Last Name:</td>
			 	<td><label><input id="ln" type="text" name="ln" ></label></td>
				<td id="ln_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Email:</td>
			 	<td><label><input id="email" type="text" name="email" ></label></td>
				<td id="em_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>User Name:</td>
			 	<td><label><input id="un" type="text" name="un" ></label></td>
				<td id="un_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
				<td>Password:</td>
			 	<td><label><input id="pass" type="password" name="pass" ></label></td>
				<td id="pass_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
				<td>Contact No1:</td>
			 	<td><label><input id="cn1" type="text" name="cn1" ></label></td>
				<td id="cn1_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
				<td>Contact No2:</td>
				<td><label><input id="cn2" type="text" name="cn2" ></label></td>
				<td id="cn2_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Address:</td>
			 	<td><label><textarea id="address" type="text" name="address" ></textarea></label></td>
				<td id="add_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>city:</td>
			 	<td><label><input id="city" type="text" name="city" ></label></td>
				<td id="city_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
				<td>Secret Question:</td>
				<td><label>
					<select name="que" id="que" style="width:300px">
						<option></option>
						<option value="nick_name">What is your Nick Name??</option>
						<option value="cousin_name">What is the name of your favourite cousin??</option>
						<option value="childhood_hero">What is your childhood hero??</option>
					</select>
			 	</label></td>
				<td id="que_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Answer:</td>
			 	<td><label><input id="ans" type="text" name="ans" ></label></td>
				<td id="ans_err" style="color:#993300; font-style:italic;">*</td>
			</tr>
			<tr>
			 	<td>Image:</td>
			 	<td><label><input id="image" required="required" type="file" name="image" ></label></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><label><br />
						<input type = "submit" name = "submit" value = "submit" onclick="javascript:return ValidateTextBox();"/>
						
				</label></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="employee_login.php">Already have an Account? LogIn Here</a></td>
			</tr>
		
		</table>
	</form>
<?php
	include("footer.php"); 
?>
