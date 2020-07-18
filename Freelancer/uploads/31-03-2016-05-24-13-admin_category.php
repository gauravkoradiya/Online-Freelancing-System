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
			<div id="site_title"><h1><a href="#">Carpet Template</a></h1></div>
			<div id="tooplate_menu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="gallery.html" class="current">Registration</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>    	
			</div> <!-- end of tooplate_menu -->
		</div> <!-- end of forever header -->
		
		<div id="tooplate_middle">
			<div id="mid_title">Project List</div>
				
			<div class="cleaner"></div>
		</div> <!-- end of middle -->
		
		<div id="tooplate_main_top"></div>
		<div id="tooplate_main">
			
			<div id="gallery">
		<?php
		$mysql_hostname="localhost";
	$mysql_user="root";
	$mysql_password="";
	$mysql_database="project";
	
	$db=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)or
	die("opps something went wrong with connection");
	
	mysql_select_db($mysql_database,$db)or
	die("opps something went wrong with database");
		
		if($_POST["add"])
		{
	
$sql = "insert into admin_category(c_name)values('".$_POST['c_name']."')";
$result=mysql_query($sql) or die("query");
						
}
		$sql = "SELECT * FROM admin_category";
				$result = mysql_query($sql) or die("error in select");
if (mysql_num_rows($result) > 0){
		  echo "<table><tr><td>Category Name</td></tr>";
	while($res = mysql_fetch_array($result)) { 
	while($row=mysql_fetch_assoc($result))
		  {
	 echo "<tr><td>".$row["c_name"]."</td>";		
		

		echo "<td><a href=\"edit.php?c_id=$res[c_id]\">Edit</a> | <a href=\"del.php?c_id=$res[c_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";		
	}
	
		  }
			echo "</table>";
		}
			else
			{
			echo " not found";
			}
		?>
		<form id="form1" name="form1" method="post">
			Category:<input type="text" name="c_name" id="c_name" required/>
			<input type="submit" value="Add" name="add"/>
			
		</form>
		
	

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