<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employer_id'];
$f=0;

if(isset($_REQUEST['pid']))
{
	$p=$_REQUEST['pid'];
}
if(isset($_REQUEST['employee_id']))
{
	$e_id=$_REQUEST['employee_id'];
}
if(isset($_REQUEST['budget']))
{
	$b=$_REQUEST['budget'];
}
$result=mysql_query("select p_id from prj_allocated where p_id=".$p)or die("Error select");
if(mysql_num_rows($result)>0)
{
	while($r=mysql_fetch_array($result))
	{ 
		if($p ==$r[0])
		{
			$f=1;
		}
		
	}
}
else
		{
			//echo"sonali";
			mysql_query("insert into prj_allocated (p_id,budget,employee_id,employer_id,date) values ('$p','$b','$e_id','$eid',now())")or die("Error in insert");
		}
?>
<div id="tooplate_middle">
	<div id="mid_title">Project Allocation</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
<div id="gallery">
<?php 
if($f==1)
	{
?>
	<div  class="wrapper" style="font-size:20px;"><b><u>This Project Already Allocated to..</u></b></div>
	<table width="20%">
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
				
					}
					}
				?>
			
		<?php
					
				?>
			
			</td></tr>
	</table>
<?php 
	} 
	else
	{
?>
	<table width="20%">
	<tr><td>Project Allocated to</td>
		<td>:</td>
		<td> 
			<?php 
				$result3=mysql_query("select * from employee_regitbl where employee_id=".$e_id,$con)or die("Error in Select Query1");
				if(mysql_num_rows($result3)>0)
				{
					while($r3=mysql_fetch_array($result3))
					{ 
						echo $r3[4];
					}
				}
			?>
		</td>
	<tr><td>Project Name</td>
		<td>:</td>
		<td>
			<?php
				$result4=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
				if(mysql_num_rows($result4)>0)
				{
					while($r4=mysql_fetch_array($result4))
					{  
						echo $r4[1];
					}
				}
			?>
		</td></tr>
	<tr><td>Budget</td>
		<td>:</td>
		<td>
			<?php
				echo $b;
			?>
		</td></tr>
	</table>
<?php
	}
	include("footer.php"); 
?>