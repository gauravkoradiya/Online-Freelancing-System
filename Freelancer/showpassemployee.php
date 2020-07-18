<?php
session_start();
include("header.php");
include("Config.php");
?>
<div id="tooplate_middle">
	<div id="mid_title"></div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	Your Password is <b><?php echo $_SESSION['pass'];?></b>
			<br><a href="employee_Login.php">LogIn</a>
<?php
	include("footer.php"); 
?>