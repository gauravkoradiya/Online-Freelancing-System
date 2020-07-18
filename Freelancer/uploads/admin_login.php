<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carpet Theme - Gallery Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2038 Carpet
http://www.tooplate.com/view/2038-carpet
-->
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<!--////// CHOOSE ONE OF THE 3 PIROBOX STYLES  \\\\\\\-->
<link href="css_pirobox/white/style.css" media="screen" title="shadow" rel="stylesheet" type="text/css" />
<!--<link href="css_pirobox/white/style.css" media="screen" title="white" rel="stylesheet" type="text/css" />
<link href="css_pirobox/black/style.css" media="screen" title="black" rel="stylesheet" type="text/css" />-->
<!--////// END  \\\\\\\-->

<!--////// INCLUDE THE JS AND PIROBOX OPTION IN YOUR HEADER  \\\\\\\-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 600, //animation speed
			bg_alpha: 0.5, //background opacity
			radius: 4, //caption rounded corner
			scrollImage : false, // true == image follows the page, false == image remains in the same open position
			pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
			pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
			close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
			slideShow : 'slideshow', // just delete slideshow between '' if you don't want it.
			slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
	});
});
</script>
<!--////// END  \\\\\\\-->

</head>
<body>

<div id="tooplate_wrapper">
	<div id="tooplate_main_wrapper">
	
		<div id="tooplate_header">
			<div id="site_title"><h1><a href="#">Carpet Template</a></h1>
			</div>
		</div> <!-- end of forever header -->
		
		<div id="tooplate_middle">
			<div id="mid_title"><center>Admin Login</center></div>
				
			<div class="cleaner"></div>
		</div> <!-- end of middle -->
		
		<div id="tooplate_main_top"></div>
		<div id="tooplate_main">
			
			<div id="gallery">
	
	<div align="center">
	<table border="2">
		<form action="" method="POST">
		<tr><td><label>User Name:</label></td>
			<td><input type="text" name ="username"></td></tr>
		<tr><td><label>Password:</label></td>
			<td><input type="Password" name="pass"><br/></td></tr>
		<tr><td></td><td><input type="Submit" name="login" value="Submit"/></td></tr><br>
		</form></table>
	</div>
	
<?php
	$mysql_hostname="localhost";
	$mysql_user="root";
	$mysql_password="";
	$mysql_database="project";
	
	$db=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)or
	die("opps something went wrong with connection");
	
	mysql_select_db($mysql_database,$db)or
	die("opps something went wrong with database");

	session_start();
	if($_POST["login"])
	{
		$myusername=$_POST['username'];
		$mypassword=$_POST['pass'];
		$sql="SELECT * FROM admin_login WHERE 
		 username='$myusername' and
		 password='$mypassword'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$count=mysql_num_rows($result);
		if($count==1)
		{
			$_SESSION['login_user']=$myusername;
			//echo "Your login name or password is valid";
			header("Location:admin_home.php");
		}
		else
		{?>
			<center>your login name or password is invalid</center>
		<?php }
	}
?>
				<div class="cleaner"></div>
			</div>
			
			<div class="cleaner"></div>
		</div> <!-- end of main -->
		<div id="tooplate_main_bot"></div>

		
		<div id="tooplate_footer">
		
			Copyright © 2048 <a href="#">Company Name</a> - Design: <a href="http://www.tooplate.com">tooplate</a>
			
		</div>
		
	</div> <!-- main wrapper -->
</div> <!-- wrapper  -->

</body>
</html>


