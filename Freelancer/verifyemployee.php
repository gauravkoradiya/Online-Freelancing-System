<?php
session_start();
include("header.php");
include("Config.php");
$f=0;
if(isset($_POST['submit']))
{
 $result=mysql_query("Select pass from employee_regitbl where ans='".$_POST['ans']."'",$con) or die("Error In Select Query");
 if(mysql_num_rows($result)>0)
 {
  $_SESSION['pass']=mysql_result($result,0);
  header("location:showpassemployee.php");
 }
 else 
 {
  $f=1;
 } 
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Verify Answer</div>
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
                      Invalid Answer
                  </div>
				<?php } ?>  
				<tr>
			 		<td align="left"><?php echo $_SESSION['que'];?></td>
				</tr>
				<tr>
			 		<td align="center"><label><input type="text" id="ans" name="ans" placeholder="Plz.. Enter Your Answer" required="required"/></label></td>
				</tr>
				
                <tr>
		
					<td align="left"><label><br />
						<input type = "submit" name = "submit" value = "Submit" />
					</label></td>
				</tr>    
                  </table>
              </form>

<?php
	include("footer.php"); 
?>
