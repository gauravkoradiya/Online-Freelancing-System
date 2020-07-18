<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
$eid= $_SESSION['employee_id'];
$f=0;
if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
 if(isset($_POST["submit"]))
	{
		mysql_query("update prjtbl set p_name='".$_POST['pname']."',details='".$_POST['details']."',budget='".$_POST['budget']."',days='".$_POST['days']."',date=now() where p_id=".$p)or die("update Error");
			//mysql_query("insert into bidtbl(employee_id,project_id,budget,days,employer_id,status,date)values('$eid','".$_POST['pid']."','".$_POST['b1']."','".$_POST['d1']."','".$_POST['e_id']."','',now())")or die("Error");
			header("location:employerviewbid.php?pid=".$p);
	}
	
?>
<div id="tooplate_middle">
	<div id="mid_title">Project Detail</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	
	<?php
	if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
 ?>				
<form method="post">
<table width="100%" border="2">				
<?php
	$result=mysql_query("select * from prjtbl where p_id=".$p,$con)or die("Error in Select Query1");
	if(mysql_num_rows($result)>0)
	{
		while($r=mysql_fetch_array($result))
		{ 
?>
<tr>
	<td>Project Name</td>
	<td align="center" width="10%">:</td>
	<td align="left"><input type="text" name="pname" value="<?php echo $r[2]; ?>"/></td>
</tr>
<tr>
	<td>Details</td>
	<td align="center" width="10%">:</td>
	<td align="left"><textarea rows="3" name="details"><?php echo $r[5]; ?></textarea></td>
</tr>
<tr>
	<td>Budget</td>
	<td align="center" width="10%">:</td>
	<td align="left">
	<select name="budget" id="budget" required="required" width="150" style="width:180px" height="35px" />
	
                <option value="<?php echo $r[6]; ?>"><?php echo $r[6]; ?></option>
                 <option value="Under $250">Under $250</option>
                                    <option value="$250 to $500">$250 to $500</option>
                                    <option value="$500 to $1,000">$500 to $1,000</option>
                                    <option value="$1,000 to $2,500">$1,000 to $2,500</option>
                                    <option value="$2,500 to $5,000">$2,500 to $5,000</option>
                                    <option value="$5,000 to $10,000">$5,000 to $10,000</option>
                                    <option value="$10,000 to $25,000">$10,000 to $25,000</option>
                                    <option value="Over $25,000">Over $25,000</option>
                                    <option value="Not Sure/Confidential">Not Sure/Confidential</option>
                </select></td>
</tr>
<tr>
	<td>Days to Complete</td>
	<td align="center" width="10%">:</td> 
	<td align="left"><input type="text" name="days" value="<?php echo $r[7]; ?>"/></td>
</tr>
			<?php	
					}
				}
				?>
				
				<tr><td></td><td></td><td><input type="hidden" name="pid" value="<?php echo $p;?>" /></td></tr>
				</table>
				<table width="100%">
				<tr><td width="42%"></td><td></td><td><input type="hidden" name="pid" value="<?php echo $p;?>" /></td></tr>
				<tr><td></td><td></td><td align="left"><input type="submit" name="submit" value="Update"/></td></tr>
				</table>
				</form>
<?php
include("footer.php");
?>