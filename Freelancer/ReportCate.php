<?php 
session_start();
ob_start();
include("config.php");
include("header.php");

 ?>
 
 
<div id="tooplate_middle">
	<div id="mid_title">WelCome <?php echo $_SESSION['unm'];?></div>
	<a href="Reports.php"><b>Reports</b></a>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
<div id="tooplate_main_top"></div>

<div id="tooplate_main">
	<div id="gallery">
 
 
 <center>
	<font size="7"> Report Category </font><br><br>
	<table>
		<tr>
			<td>
				<form action="" method="post">
					<b> Search your Record:</b><input type="text" name="txtsearch"/>
					<input type="Submit" name="btnsearch" value="Search"/>
					
				</form>
			</td>
		</tr>
	</table>
	<br><br>
	<table width="20%" border="1" style="padding:10px 10px 10px 10px">
		<tr>
			<td> <b>Category Name </b></td>
			
		</tr>
		<tr>
			<td colspan="9"> <hr></hr> </td>
		</tr>
		
		<?php 
		if(isset($_POST["btnsearch"]))
		{
			$query="select * from catetbl where cate_name Like '%$_POST[txtsearch]%'";
			$res=mysql_query($query)or die(mysql_error());
			while($row=mysql_fetch_array($res))
			{
				

		?>
		<tr>
			<td> <?php echo $row[1]; ?></td>
		</tr>
		<?php
		
			}	
		}	
		?>
	</table>
	<br><br>
 </center>
<?php

include("footer.php");
?>