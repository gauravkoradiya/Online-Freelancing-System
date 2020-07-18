<?php
session_start();
ob_start();
include("header.php");
include("Config.php");

if(isset($_REQUEST['pid']))
{
	$p=$_REQUEST['pid'];
}

?>
<div id="tooplate_middle">
	<div id="mid_title">Project Allocation</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
<div id="gallery">

	<table width="100%">
		<tr><td>Project Allocated to</td>
			<td>:</td>
			<td><?php 
					$result1=mysql_query("select * from prj_allocated where p_id=".$p,$con)or die("Error in Select Query1");
					if(mysql_num_rows($result1)>0)
					{
						while($r1=mysql_fetch_array($result1))
						{ 
							$result5=mysql_query("select * from employee_regitbl where employee_id=".$r1[3],$con)or die("Error in Select Query1");
							if(mysql_num_rows($result5)>0)
							{
								while($r5=mysql_fetch_array($result5))
								{ 
									echo $r5[4];
								}
							}
				?>
				</td></tr>
				<tr><td>Project Name</td>
					<td>:</td>
					<td>
					
				<?php
				$result2=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
					if(mysql_num_rows($result2)>0)
					{
						while($r2=mysql_fetch_array($result2))
						{  
							echo $r2[2];
						}
					}
				?>
				</td></tr>
				
		<tr><td>Budget</td>
			<td>:</td>
			<td><?php
					echo $r1[2];
				?></td></tr>
				<tr><td>Date of Allocation:</td>
			<td>:</td>
			<td><?php
			echo $r1[5];
					}
					}
				?>
			
		<?php
					
				?>
			
			</td></tr>
	</table>
<?php 
	
	include("footer.php"); 
?>