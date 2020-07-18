<?php
session_start();
include("config.php");
include("header.php");
?>
<head>

        <link href="css/collapsible-menu.css" type="text/css" rel="stylesheet">
<style>
a { text-decoration:none}
</style>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/collapsible-menu.js"></script>
        <script>
            $(document).ready(function () {
                $('#collapsible-menu-transition').change(function () {
                    $('.collapsible-menu').data('collapsible-menu', this.value);
                    var anchors = $('.collapsible-menu a.expanded');

                    if (this.value == 'accordion' && anchors.length > 1) {
                        anchors.not(anchors[0]).removeClass('expanded').addClass('collapsed').find('+ ul').slideUp('medium');
                    }
                });

                $('#collapsible-menu-transition').val($('.collapsible-menu').data('collapsible-menu'));
            });
        </script>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    </head>

   <div id="tooplate_middle">
	<div id="mid_title">Category & SubCategory</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery">
<div class="jquery-script-clear"></div>
        <ul class="collapsible-menu" data-collapsible-menu="slide">
			<?php
				$result=mysql_query("select * from catetbl",$con)or die("Error in Select Query");
				if(mysql_num_rows($result)>0)
				{
					while($r=mysql_fetch_array($result))
					{?>
		   <li>
                <a class="expanded"> <?php  echo $r[1];?></a>
                <ul>
				<?php
				$result1=mysql_query("select * from subcatetbl where cate_id=".$r[0],$con)or die("Error in Select Query");
				if(mysql_num_rows($result1)>0)
				{
					while($r1=mysql_fetch_array($result1))
					{ 
					?>
                    <li><div><?php echo $r1[1]; ?>
					<a href="editsubcategory1.php?sid=<?php echo $r1[0];?> &amp; cid=<?php echo $r1[2]; ?>"> Edit </a>
					<a href="delsubcategory1.php?sid=<?php echo $r1[0];?> &amp; cid=<?php echo $r1[2];?>"> Delete </a>
				</div></li>
					<?php }
				}?>
                </ul>
            </li>
					<?php }
				}
				?>
        </ul>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php
include("footer.php");
?>
