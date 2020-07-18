<?php
include('config1.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT * FROM subcatetbl WHERE cate_id=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select SubCategory</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['sub_id']; ?>"><?php echo $row['sub_name']; ?></option>
        <?php
	}
}
?>