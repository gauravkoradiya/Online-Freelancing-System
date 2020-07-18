<?php
session_start();
ob_start();
include("header.php");
include("Config.php");
	$un= $_SESSION['unm'];
if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
 if($_REQUEST['submit'])
 {
   $mess=$_REQUEST['mess']  ;

   $insert="insert into message (p_id,username,message) values('".$p."','$un','$mess')";
   mysql_query($insert) or die("Error in insert");
   //header("location:message.php");
 }
?>
<div id="tooplate_middle">
	<div id="mid_title">Messages</div>
	<div class="cleaner"></div>
</div> <!-- end of middle -->
		
<div id="tooplate_main_top"></div>
<div id="tooplate_main">
	<div id="gallery"> 
 <form action="#" method="post">
                <table border="5" width="300px">
                <tr>
                <th>Sender</th>
                <th>Messages</th>
                </tr>
                <?php
					$un= $_SESSION['unm'];
if(isset($_REQUEST['pid']))
				{		$p=$_REQUEST['pid'];
				}
                $select1="select * from message where p_id=".$p;
                $res=mysql_query($select1);
                while($row=mysql_fetch_array($res))
                {
                ?>
                <tr>
                <td>
                <?php echo $row[2] ?>  
                </td>
                <td>
                <?php echo $row[3]?>
                </td>
                </tr>
                <?php
                }
?>               </table>
                
                message<br>
                <textarea cols="5" rows="5" name="mess" style="width: 350px;"></textarea><br><br><br>
                <input type="submit" name="submit" value="Send">
                </table>
                </form>  
	<?php
include("footer.php");
?>