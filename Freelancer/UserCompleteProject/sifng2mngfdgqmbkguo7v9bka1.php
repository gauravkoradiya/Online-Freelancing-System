<?php
session_start();
include("header.php");
include("DBConfig.php");
?>

<section id="content">
      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
            <h4><font color="#FF0000"></font></h4>
              <h2>Course</h2>
			  <table>
			  	<tr>
					<td align="center">Name</td>
					<td align="right" colspan="2"><a href="AddCourse.php">Add New Course</a></td>
				</tr>
				<?php
				$result=mysql_query("select * from tblcourse",$con)or die("Error in Select Query");
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
				<tr>
					<td align="center" style="padding:5px;"><?php  echo $r[1];?>	</td>
					<td align="center" style="padding:5px;"><a href="editcourse.php?cid=<?php echo $r[0];?>"> Edit </a></td>
					<td align="center" style="padding:5px;"><a href="Delcourse.php?cid=<?php echo $r[0];?>"> Delete </a></td>
				</tr>
				
				<?php } } ?>
			  </table>

<?php
include("footer.php");
?>