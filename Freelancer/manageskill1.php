<?php
session_start();
include ("config1.php");
include("header.php");
$e_id=$_SESSION['employee_id'];?>

<style>
label
{
font-weight:bold;
padding:10px;
}
</style>
<div id="tooplate_middle">
	<div id="mid_title"></div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">

<form method="POST">	<table><tr>
<td><label>Category :</label> </td>
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
</select></td>
<td rowspan="3" align="center">
	
	<input name="submit" value="Add Skill" type="submit">
	
	</td>
	<td rowspan="3" align="center">
	<?php 
	$stmt = $DB_con->prepare("SELECT * FROM choosed_skill where employee_id=$e_id");
	$stmt->execute();
	?>
	<select name="choosed_skill" width="150" style="width:180px" height="35px" multiple="multiple">
<?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$sk= $row['skill_id'];
		
		$stmt1 = $DB_con->prepare("SELECT * FROM skilltbl where skill_id=$sk");
		$stmt1->execute();
		while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
		{
			
		?>
        <option value="<?php echo $row1['skill_id'];?>">
		<?php echo $row1['skill_name'];?>
		 </option>	
		<?php
		}
		
	} 
if(isset($_POST['submit'],$_POST['skill']))
	
	{
		 foreach ($_POST['skill'] as $selectedOption)
		{
			$s= $selectedOption;
			include ("config.php");
			
			mysql_query("insert into choosed_skill(employee_id,skill_id) values('$e_id','$s')") or die("error in insert");
		}
	

	
}
?>
</select>
	</td>
</tr>
<tr><td><label>Sub :</label></td>
<td> <select name="sub" class="sub" width="150" style="width:180px" height="35px">
<option selected="selected">--Select SubCategory--</option>
</select></td></tr>
<tr><td><label>Skill :</label> </td>
<td><select name="skill[] " class="skill" width="150" style="width:180px" height="35px" multiple="multiple">
<option selected="selected">--Select skill--</option>
</select></td></tr>
</table></form>
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
	
	
	
});
</script>

<?php 
include("footer.php");
?>