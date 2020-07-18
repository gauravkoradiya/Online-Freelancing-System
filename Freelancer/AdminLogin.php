<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$f=0;
if(isset($_POST['btnlogin']))
{
	$_SESSION['user_role']="Admin";
 $result=mysql_query("Select admdp from adminlogin where admemail='".$_POST['email']."' and admpass='".$_POST['pass']."'",$con) or die("Error In Select Query");
 if(mysql_num_rows($result)>0)
 {
  $_SESSION['unm']=mysql_result($result,0);

  header("location:AdminHome.php");
 }
 else 
 {
  $f=1;
 } 
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Admin LogIn</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 <form id="ContactForm" action="" method="post">
		 	<table>
			  <?php 
			  if ($f==1)
			  { ?>
			  <div  class="wrapper"> 
                      Invalid User Name Or Passwaord
                  </div>
				<?php } ?>  
				<tr>
			 		<td align="center">Email:</td>
			 		<td align="center"><label><input type="text" id="email" name="email" required="required"/></label></td>
				</tr>
				<tr>
					<td align="center">Password:</td>
			 		<td align="center"><label><input id="pass" type="password" name="pass" required="required" ></label></td>
				</tr>
                <tr>
					<td></td>
					<td align="left"><label><br />
						<input type = "submit" name = "btnlogin" value = "Login" />
					</label></td>
				</tr>    
				<tr><td></td><td align="left"><a href="AdminForgotPass.php">Forgot password?</a></td></tr>
                  </table>
              </form>

<?php
	include("footer.php"); 
?>
