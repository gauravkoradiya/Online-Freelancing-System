<?php
session_start();
include ("config1.php");
include("header.php");
$e_id=$_SESSION['employee_id'];

?>

<style>

</style>
<div id="tooplate_middle">
	<div id="mid_title"></div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
<form method="POST">
<table><th></th><th>Selected Skill List</th><tr><td>	
<table><tr>
<td align="right"><label>Category :</label> </td>
<td><select name="Category" class="Category" width="150" style="width:180px" height="35px">
<option selected="selected">--Select Category--</option>
<?php
	$stmt = $DB_con->prepare("SELECT * FROM catetbl");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></option>
        <?php
	} 
?>
</select></td></tr>
<tr><td align="right"><label>SubCategory :</label></td>
<td> <select name="sub" class="sub" width="150" style="width:180px" height="35px">
<option selected="selected">--Select SubCategory--</option>
</select></td></tr>
<tr><td align="right"><label>Skill :</label> </td>
<td><select name="skill[] " class="skill" width="150" style="width:180px" height="35px" multiple="multiple">
<option selected="selected">--Select skill--</option>
</select></td></tr>
</table>
</td>
<td><div name="choosed_skill" class="choosed_skill" align="center">
<table align="center" width="40%">	<tr>
<?php

$stmt = $DB_con->prepare("SELECT DISTINCT skill_id FROM choosed_skill where employee_id=$e_id ");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$sk= $row['skill_id'];
		$stmt1 = $DB_con->prepare("SELECT * FROM skilltbl where skill_id=$sk");
		$stmt1->execute();
		?>
	
		<?php
		while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
		{
			?>
      
	  <td align="left"> <?php echo $row1['skill_name'];?></td>
	 <td align="center"><a href="deletechoosedskill.php?skill_id=<?php echo $row1['skill_id'];?>">Delete</a>
	 </td></tr>
	<?php
		}?><?php
	}
?></table>
</div>
</td>
</tr></table>
</form>

<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".Category").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "choosesubcategory.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".sub").html(html);
			} 
		});
	});
	
	
	$(".sub").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "chooseskill.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".skill").html(html);
			} 
		});
	});
	
	$(".skill").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "choose.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".choosed_skill").html(html);
			} 
		});
	});
});
</script>

<?php 
include("footer.php");
?>