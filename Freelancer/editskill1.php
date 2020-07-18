<?php
session_start();
include("header.php");
include("Config.php");
if(isset($_POST['btnsave']))
{
 $result=mysql_query("update skilltbl set skill_name='".$_POST['skill_name']."' where skill_id=".$_REQUEST['skid'],$con)or die("Error In Update Query");
	if(isset($_REQUEST['cid']))
				{
					$c=$_REQUEST['cid'];
				}
	if(isset($_REQUEST['sid']))
				{
					$s=$_REQUEST['sid'];
				}
	$v="skill.php";
header("location:$v?cid=$c& sid=$s");
}
?>
<div id="tooplate_middle">
	<div id="mid_title">Edit Skill</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		 <form id="EditSkillForm" action="" method="post">
		  <?php
			  	if(isset($_REQUEST['skid']))
				{
					
			  		$sk=$_REQUEST['skid'];
				}	
			   $result=mysql_query("select skill_name from skilltbl where skill_id=".$sk,$con)or die("Error In Select Query");
			   if(mysql_num_rows($result))
			   {
			   	while($r=mysql_fetch_array($result))
				{?>
		 	<table>  
				<tr>
			 		<td align="center">Skill Name:</td>
			 		<td align="center"><label><input type="text" value="<?php echo $r[0];?>" id="skill_name" name="skill_name" required="required"/></label></td>
				</tr>
				<?php } }?>
                <tr>
					<td></td>
					<td align="left"><label><br />
						<input type = "submit" name = "btnsave" value = "Save" />
					</label></td>
				</tr>    
                  </table>
              </form>

<?php
	include("footer.php"); 
?>
