<?php
session_start();
include("header.php");
include("Config.php");
$e_id=$_SESSION['employee_id'];
?>
<div id="tooplate_middle">
	<div id="mid_title">My Profile</div>
	<div class="cleaner">
	</div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 
		  <?php	
			  $result=mysql_query("select * from employee_regitbl where employee_id=".$e_id,$con)or die("Error In Select Query");
			   if(mysql_num_rows($result))
			   {
			   	while($r=mysql_fetch_array($result))
				{?>
		 		<table width="80%"><tr><td>
				
                <form id="form2" name="form2" method="post" >
			
		 <table border="0" width="80%">
			<tr>
			 	<td>First Name</td><td width="10%">:</td>
			 	<td><?php echo $r[1]; ?></td>
			</tr>
			<tr>
			 	<td>Last Name</td><td>:</td>
			 	<td><?php echo $r[2]; ?></td>
			</tr>
			<tr>
			 	<td>Email</td><td>:</td>
			 	<td><?php echo $r[3]; ?></td>
			</tr>
			<tr>
			 	<td>User Name</td><td>:</td>
			 	<td><?php echo $r[4]; ?></td>
			</tr>
			<tr>
				<td>Contact No1</td><td>:</td>
			 	<td><?php echo $r[6]; ?></td>
			</tr>
			<tr>
				<td>Contact No2</td><td>:</td>
				<td><?php echo $r[7]; ?></td>
			</tr>
			<tr>
			 	<td>Address</td><td>:</td>
			 	<td><?php echo $r[8]; ?></td>
			</tr>
			<tr>
			 	<td>city</td><td>:</td>
			 	<td><?php echo $r[9]; ?></td>
			</tr>
			<tr>
			 	<td>Image</td><td>:</td>
			 	<td><img src="UserImages/<?php echo $r[13];?>" height="90" width="90"/></td>
			</tr>	
		</table></form></td>
		<td> </td></tr></table></form>
		<a href="employee_editprofile1.php">Edit Profile</a><br/>
	<a href="employee_changepass.php">Change Password</a>
	
	<?php 
	}
	}
	include("footer.php"); 
?>
