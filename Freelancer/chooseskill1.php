<?php
session_start();
include('config1.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	$stmt = $DB_con->prepare("SELECT * FROM skilltbl WHERE cate_id=:id");
	$stmt->execute(array(':id' => $id));?>
	<option selected="selected">Select SubCategory</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['skill_id']; ?>"><?php echo $row['skill_name']; ?></option>
		
		<?php
	}
	}
?>