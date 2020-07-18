<?php
session_start();
include("header.php");
include("Config.php");
$f=0;
if(isset($_POST['submit']))
{
 $result=mysql_query("Select que from employee_regitbl where em='".$_POST['email']."'",$con) or die("Error In Select Query");
 if(mysql_num_rows($result)>0)
 {
  $_SESSION['que']=mysql_result($result,0);
  header("location:verifyemployee.php");
 }
 else 
 {
  $f=1;
 } 
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Forgot Password</div>
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
                      Invalid Email
                  </div>
				<?php } ?>  
				<tr>
			 		<td align="center">Email:</td>
			 		<td align="center"><label><input type="text" id="email" placeholder="Please Enter Your Email" name="email" required="required"/></label></td>
				</tr>
				
                <tr>
					<td></td>
					<td align="left"><label><br />
						<input type = "submit" name = "submit" value = "Submit" />
					</label></td>
				</tr>   
                  </table>
              </form>

<?php
	include("footer.php"); 
?>
