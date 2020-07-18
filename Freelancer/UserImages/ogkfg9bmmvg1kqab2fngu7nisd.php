<?php
session_start();
include("header.php");
include("DBConfig.php");
$f=0;
if(isset($_POST['btnlogin']))
{
 $result=mysql_query("Select dpnm from tbladmin where usernm='".$_POST['txtemail']."' and adminpass='".$_POST['txtpassword']."'",$con) or die("Error In Select Query");
 if(mysql_num_rows($result)>0)
 {
  $_SESSION['unm']=mysql_result($result,0);
  header("location:adminhome.php");
 }
 else 
 {
  $f=1;
 } 
}
?>
<section id="content">
      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
            <h4><font color="#FF0000"><?php if(isset($err)) echo $err?></font></h4>
              <h2>Login form</h2>
              <form id="ContactForm" action="" method="post">
			  <?php 
			  if ($f==1)
			  { ?>
			  <div  class="wrapper"> 
                      Invalid User Name Or Passwaor
                  </div>
				<?php } ?>  
                  <div  class="wrapper"> <strong>Email-ID:</strong>
                    <div class="bg">
                      <input type="text" class="input"  name="txtemail" required="required">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Password:</strong>
                    <div class="bg">
                       <input type="password" class="input"  name="txtpassword" required="required">
                    </div>
            		</div>
                  </div>
                  <div  class="wrapper"><strong>&nbsp;</strong>
                    <div class="bg">
                      <input type="reset" class="button" value="Cancel"/><input type="submit" name="btnlogin" class="button" value="Login"/>   
                    </div>
                  </div>
              </form>
<?php
include("footer.php");
?>