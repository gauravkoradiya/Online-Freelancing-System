<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FreeLancer</title>
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
<script type= "text/javascript" src="validation.js" language="javascript"></script>
<script type= "text/javascript" src="vali.js" language="javascript"></script>
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

</head><body>
 

<div id="tooplate_wrapper">
	<div id="tooplate_main_wrapper">
	
		<div id="tooplate_header">
			<div id="site_title"><h1><a href="#">FreeLancer</a></h1></div>
			<div id="tooplate_menu">
				<?php if($_SESSION["user_role"]=="Admin")
				{
					?>
					<ul>
					<li><a href="adminhome.php">Home</a></li>
					<li><a href="Category.php">Category</a></li>
					<li><a href="SubCategory.php">SubCategory</a></li>
					<li><a href="skill.php">Skill</a></li>
					<li><a href="adminallusers.php">Users</a></li>
					<li><a href="Complaints.php">Complaints</a></li>
					<li><a href="logout.php">LogOut</a></li>
				</ul> 
				<?php }
				else if($_SESSION["user_role"] == "Employee")
				{
					?> 
				<ul>
					<li><a href="employee_home.php">Home</a></li>
					<li><a href="ManageSkill.php">ManageSkill</a></li>
					<li><a href="employee_editprofile.php">MyProfile</a></li>
					<li><a href="interestedprj.php">SkilledProjects</a></li>
					<li><a href="bidprj.php">BidProjets</a></li>
					<li><a href="logout.php">LogOut</a></li>
				</ul>
				<?php }
				else if($_SESSION["user_role"] == "Employer")
				{					?>
					<ul>
					<li><a href="employer_home.php">Home</a></li>
					<li><a href="employer_editprofile.php">MyProfile</a></li>
					<li><a href="postproject.php">Post Project</a></li>
					<li><a href="logout.php">LogOut</a></li>
				</ul><?php }
				else
				{
					?><ul>
					<li><a href="DefaultHome1.php">Home</a></li>
					<li><a href="Employee_login.php">EmployeeLogIn</a></li>
					<li><a href="Employer_login.php">EmployerLogIn</a></li>
					<li><a href="aboutus.php">AboutUs</a></li>
					<li><a href="contactus.php">contactUs</a></li>
				</ul>
				<?php }
					?>
			</div> <!-- end of tooplate_menu -->
		</div> <!-- end of forever header -->
		<link rel="stylesheet" type="text/css" href="css/contentslider.css" />
<script type="text/javascript" src="js/contentslider.js"></script>

		<div id="tooplate_middle">
			<div id="mid_slider">
				<div id="slider1" class="sliderwrapper">
	
					<div class="contentdiv">
						<img src="images/slider/webdesign.jpg" alt="Image 01" />
					</div>
		
					<div class="contentdiv">
						<img src="images/slider/mobileapp.jpg" alt="Image 02" />
					</div>            
					
					<div class="contentdiv">
						<img src="images/slider/website.jpg" alt="Image 03" />
					</div>
					
					<div class="contentdiv">
						<img src="images/slider/app.jpg" alt="Image 04" />
					</div>
				
				</div>
				
				<div id="paginate-slider1" class="pagination">
				
				</div>
				
				<script type="text/javascript">
				
				featuredcontentslider.init({
					id: "slider1",  //id of main slider DIV
					contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
					toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
					nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
					revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
					enablefade: [true, 0.2],  //[true/false, fadedegree]
					autorotate: [true, 3000],  //[true/false, pausetime]
					onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
						//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
						//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
					}
				})
				
				</script>
			</div>
			
			<div id="mid_left">
				<div id="mid_title">
				Need work done???	
				</div>
				<p>Post your project and receive competitive bids from freelancers within minutes. Our reputation system will make it easy to find the perfect freelancer for your job. It's the simplest and safest way to get work done online!
</p>
</div>
			
			<div class="cleaner"></div>
		</div> <!-- end of middle -->
