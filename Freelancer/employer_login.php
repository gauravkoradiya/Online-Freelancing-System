<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$f=0;
if(isset($_POST['btnlogin']))
{
  $_SESSION["user_role"]="Employer";
$result1=mysql_query("Select em from employer_regitbl where em='".$_POST['em']."' and pass='".$_POST['pass']."'",$con) or die("Error In Select Query");
 $result2=mysql_query("Select un from employer_regitbl where em='".$_POST['em']."' and pass='".$_POST['pass']."'",$con) or die("Error In Select Query");
 $result3=mysql_query("Select employer_id from employer_regitbl where em='".$_POST['em']."' and pass='".$_POST['pass']."'",$con) or die("Error In Select Query");
   
if(mysql_num_rows($result1)>0 && mysql_num_rows($result2)>0 && mysql_num_rows($result3)>0)
 {
 
  $_SESSION['em']=mysql_result($result1,0);
  $_SESSION['unm']=mysql_result($result2,0);
   $_SESSION['employer_id']=mysql_result($result3,0);
  header("location:employer_home.php");
 }
 else 
 {
  $f=1;
 } 
}
?>
 <div id="tooplate_middle">
	<div id="mid_title">LogIn</div>
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
			 		<td align="right">Email:</td>
			 		<td align="center"><label><input type="text" id="em" name="em" required/></label></td>
				</tr>
				<tr>
					<td align="right">Password:</td>
			 		<td align="center"><label><input id="pass" type="password" name="pass" required/></label></td>
				</tr>
				<tr><td></td><td><a href="forgotemployer.php">Forgot Password???</a></td></tr>
                <tr>
					<td></td>
					<td align="left"><label><br />
						<input type = "submit" name = "btnlogin" value = "LogIn" />
					</label></td>
				</tr>  
				<tr>
				<td align="center" colspan="2"><a href="employer_regi.php">Create a new Account?? Register Here</a></td>
				</tr>
                  </table>
              </form>
<?php
	include("footer.php"); 
?>