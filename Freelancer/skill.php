<?php
session_start();
include("config.php");
include("header.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style>
	
	body { font: 0.8em Arial; }
	.pageContent { width: 100; }
	.accordion { list-style-type: none; padding: 0; margin: 0 0 30px; border: 1px solid #17a; border-top: none; border-left: none; }
	.accordion ul { padding: 0; margin: 0; float: left; display: block; width: 100%; }
	.accordion li { background: #FAC552; cursor: pointer; list-style-type: none; padding: 0; margin: 0; float: left; display: block; width: 100%;}
	.accordion li.active>a { background: url('close.gif') no-repeat center right; }
	.accordion li div { padding: 20px; background: #FBF0A7; display: block; clear: both; float: left; width: 859px;}
	.accordion a { text-decoration: none; border-bottom: 1px solid #4df; font: bold 1.1em/2em Arial, sans-serif; padding: 0 10px; display: block; cursor: pointer; background: url('open.gif') no-repeat center right;}
	
	/* Level 2 */
	.accordion li ul li { background: #FED98A; font-size: 0.9em; }

	</style>
</head>
<body>
<div id="tooplate_middle">
	<div id="mid_title">Category & Skill</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
		<ul class="accordion">
			
			<?php
				$result=mysql_query("select * from catetbl",$con)or die("Error in Select Query");
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{ 
				?>
				
				<li>
				<a href="#<?php  echo $r[0];?>"><?php  echo $r[1];?></a>				
				<ul>
				
				<?php
				
				$result1=mysql_query("select * from subcatetbl where cate_id=".$r[0],$con)or die("Error in Select Query");
				if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
				?>
				<li>	
				<a href="#<?php  echo $r1[0];?>">   <?php echo $r1[1]; ?></a>
						<?php
						
				$result2=mysql_query("select * from skilltbl where cate_id=".$r1[2]." && sub_id=".$r1[0] ,$con)or die("Error in Select Query");
				if(mysql_num_rows($result2)>0)
				{
				while($r2=mysql_fetch_array($result2))
				{ 
					?><div><?php  echo $r2[1]; ?><a href="editskill1.php?skid=<?php echo $r2[0];?> &amp; sid=<?php echo $r2[3]; ?> &amp; cid=<?php echo $r2[2]; ?>">Edit</a>
					<a href="delskill1.php?skid=<?php echo $r2[0];?> &amp; sid=<?php echo $r2[3]; ?> &amp; cid=<?php echo $r2[2]; ?>">Delete</a>
				</div>
					<?php } } ?>
					</li>	
				<?php 
				
				} } ?>
				</ul>
				
				</li>
				<?php } } ?>
		</ul>				

	<script src="dependencies/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
	<script src="jquery.accordion.source.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		// <![CDATA[
			
		$(document).ready(function () {
			$('ul').accordion();
		});
				
		// ]]>
	</script>
</body>
</html>
<?php
include("footer.php");
?>