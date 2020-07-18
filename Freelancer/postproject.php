<?php
session_start();
ob_start();
include("header.php");
include("Config1.php");
$e_id=$_SESSION['employer_id'];
if(isset($_POST['submit']))
{
	
	if(!empty($_POST['skill'])) 
	{
		foreach ($_POST['skill'] as $select)
		{
			include ("config.php");
			
			$result=mysql_query("select * from skilltbl where skill_id=".$select) or die("Please Select Category");
			if(mysql_num_rows($result)>0)
			{
				while($r=mysql_fetch_array($result))
				{ 
					$bud=$_REQUEST['bud'];
			$a=session_id();
			$b=str_shuffle($a);
			$f1=explode(".",$_FILES["file1"]["name"]);
			$file2=$b.".".$f1[1];
			move_uploaded_file($_FILES['file1']['tmp_name'],"UserFiles/".$file2)or die("error");
			
					mysql_query("insert into prjtbl(employer_id,p_name,cate_id,skill_id,details,budget,days,files,date) values('$e_id','".$_POST['pname']."','$r[2]','$select','".$_POST['details']."','$bud','".$_POST['days']."','$file2',now())") or die("error in insert");
					header("location:employer_home.php");
				}
			} 
		}
	}
	
}	
?>
<script src="jquery-1.9.0.min.js"></script>
<script>
function validateFile() {
	var file2 = $("#file1").val();
 
	var exts = ['doc','docx','pdf','zip'];
	// split file name at dot
	var get_ext = file2.split('.');
	// reverse name to check extension
	get_ext = get_ext.reverse();
 
	if (file2.length > 0 ) {
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		  return true;
		} else {
			 alert("Upload only doc, docx, pdf, zip files");
			return false;
		}			
	} else {
		alert("please upload an file");
		return false;
	}
	return false;
}
</script>
<div id="tooplate_middle">
	<div id="mid_title">Post a Project</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->	
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
	<form  method="post" enctype="multipart/form-data" >
	<table>
	<tr><td align="left">What type of work do you required?</td></tr>
	<tr><td align="left"><label>
	<select name="Category" class="Category" required="required" width="150" style="width:180px" height="35px" />
<option selected="selected">Select Category</option>
<?php
	$stmt = $DB_con->prepare("SELECT * FROM catetbl");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{	?>
        <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></option>
        <?php
	} 
?>
</select>
	</label></td></tr>
	<tr><td align="left">What Skills are Required?</td></tr>

<tr><td><select name="skill[] " class="skill" required="required" width="150" style="width:180px" height="35px">
<option selected="selected">--Select skill--</option>
</select></td></tr>
<tr><td align="left">What is your project about?</td></tr>
	<tr><td align="left"><input type="text" name="pname" id="pname" placeholder="Project Name" required="required"/></td></tr>
	
<tr><td align="left">Describe your project..</td></tr>
	<tr><td align="left"><textarea name="details" rows="2" cols="25" placeholder="Details" required="required"></textarea></td></tr>
	
	<tr><td align="left">What budget do you have in mind?</td></tr>
	<tr><td align="left"><label>
	<select name="bud" id="budget" required="required" width="150" style="width:180px" height="35px" />
	
                <option value="">--Select Budget--</option>
                 <option value="Under $250">Under $250</option>
                                    <option value="$250 to $500">$250 to $500</option>
                                    <option value="$500 to $1,000">$500 to $1,000</option>
                                    <option value="$1,000 to $2,500">$1,000 to $2,500</option>
                                    <option value="$2,500 to $5,000">$2,500 to $5,000</option>
                                    <option value="$5,000 to $10,000">$5,000 to $10,000</option>
                                    <option value="$10,000 to $25,000">$10,000 to $25,000</option>
                                    <option value="Over $25,000">Over $25,000</option>
                                    <option value="Not Sure/Confidential">Not Sure/Confidential</option>
                </select>
				</label></td></tr>
	
	<tr><td align="left">How Many Days to Complete Project?</td></tr>
	<tr><td><input type="text" name="days" id="days" placeholder="Days to Complete" required="required"/></td></tr>
	  	<tr><td>Attach Required File:</td></tr>
		<tr><td><label><input id="file1" type="file" name="file1" ></label></td>			</tr>     
		<tr></tr>
	<tr><td><input type="submit" name="submit" value="Post a Project" id="submit" onclick="validateFile();"/></td></tr>

</table>
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
			url: "chooseskill1.php",
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