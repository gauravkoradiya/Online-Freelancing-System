<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carpet Theme - Free Website Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2038 Carpet
http://www.tooplate.com/view/2038-carpet
-->
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/contentslider.css" />
<script type="text/javascript" src="js/contentslider.js">

/***********************************************
* Featured Content Slider- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

</head>
<body>

<div id="tooplate_wrapper">
	<div id="tooplate_main_wrapper">
	
		<div id="tooplate_header">
			<div id="site_title"><h1><a href="#">Carpet Template</a></h1></div>
			<div id="tooplate_menu">
				<ul>
					<li><a href="index.html" class="current">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="blog.html">category</a></li>
					<li><a href="gallery.html">Registration</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>    	
			</div> <!-- end of tooplate_menu -->
		</div> <!-- end of forever header -->
		<!-- end of middle -->
<div id="tooplate_main">

	 <?php
	 
	$mysql_hostname="localhost";
	$mysql_user="root";
	$mysql_password="";
	$mysql_database="project";
	
	$db=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)or
	die("opps something went wrong with connection");
	
	mysql_select_db($mysql_database,$db)or
	die("opps something went wrong with database");
		$sql="select * FROM admin_category";
		$result=mysql_query($sql);
		if( mysql_num_rows($result) > 0 ) 
		{
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
		<form >
	Add New Category:<input type="text" id="c_name" name="c_name"/>
	</form>	
	
      <div class="col_allw280 fp_service_box">
						<div class="con_tit_02"><li></li></div>
				</div>
				<div class="col_allw280 fp_service_box col_last"></div>
					<div class="cleaner h60"></div>
		  <div class="col_allw280 fp_service_box">
			  <div class="con_tit_02"></div>
						</div>
			  <div class="col_allw280 fp_service_box">
						<div class="con_tit_02"></div>
					</div>
			  <div class="col_allw280 fp_service_box col_last">
						<div class="con_tit_02"></div>
					</div>
					<div class="cleaner"></div>
	  </div>
				<div class="col_w900 col_w900_last">
					<div class="con_tit_01"></div>
					
					<div class="cleaner"></div>
				</div>
					<div class="cleaner"></div>
	  </div> <!-- end of main -->
	
		<div id="tooplate_main_bot"></div>
		
		<div id="tooplate_footer">
		
			Copyright � 2048 <a href="#">Company Name</a> - Design: <a href="http://www.tooplate.com">tooplate</a>
			
		</div>
	</div> <!-- main wrapper -->
</div> <!-- wrapper  -->
</body>
</html>