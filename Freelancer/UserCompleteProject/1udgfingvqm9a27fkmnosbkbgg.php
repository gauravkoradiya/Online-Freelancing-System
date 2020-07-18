<?php
session_start();
include("header.php");
include("DBConfig.php");
if(isset($_POST['btnsave']))
{
 $result=mysql_query("insert into tblcourse(coursenm) values('".$_POST['txtcnm']."')",$con)or die("Error In Insert Query");
 header("location:course.php");
}
?>
<section id="content">
      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
            <h4><font color="#FF0000"></font></h4>
              <h2>Add New Course</h2>
              <form id="ContactForm" action="" method="post">
			   <div  class="wrapper"> <strong>Course Name</strong>
                    <div class="bg">
                      <input type="text" class="input"  name="txtcnm" required="required">
                    </div>
                  </div>
                  <div  class="wrapper"><strong>&nbsp;</strong>
                    <div class="bg">
                      <input type="submit" name="btnsave" class="button" value="Save"/>   
                    </div>
                  </div>
              </form>
<?php
include("footer.php");
?>