<?php 
session_start();
include ("config1.php");
include ("config.php");
$e_id=$_SESSION['employee_id'];
if($_POST['id'])
{
$id=$_POST['id'];
mysql_query("insert into choosed_skill(employee_id,skill_id) values('$e_id','$id')") or
 die("error in insert");			
	//$stmt1 = $DB_con->prepare("SELECT * FROM choosed_skill WHERE skill_id=:id");
	//$stmt1->execute(array(':id' => $id));
	$stmt = $DB_con->prepare("SELECT DISTINCT skill_id FROM choosed_skill where employee_id=$e_id ");
	$stmt->execute();
	?>
	<div name="choosed_skill">
	<table>
<?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$sk= $row['skill_id'];
		$stmt1 = $DB_con->prepare("SELECT * FROM skilltbl where skill_id=$sk");
		$stmt1->execute();
		while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
		{
			?>
      <tr>
	  <td align="left"> <?php echo $row1['skill_name'];?></td>
	 <td><a href="deletechoosedskill.php?skill_id=<?php echo $row1['skill_id'];?>">Delete</a>
	 </td></tr>
	<?php
		}
	}
	
?></table>	
<?php
}
?>