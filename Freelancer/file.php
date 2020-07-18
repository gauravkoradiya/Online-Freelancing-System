<?php
session_start();
include("Config.php");
include("Config1.php");
$upload_dir = "uploads/";
if (isset($_FILES["myfile"])) {
    $no_files = count($_FILES["myfile"]['name']);
    for ($i = 0; $i < $no_files; $i++) {

        if ($_FILES["myfile"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["myfile"]["error"][$i] . "<br>";
        } else {

            move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $upload_dir . $_FILES["myfile"]["name"][$i]);
            echo $_FILES["myfile"]["name"][$i] . "<br>";
        }
    }
    echo " Files Uploaded Successfully!<br>";
	mysql_query("insert into prjtbl(p_name,cate_id,skill_id,details,mimamt,maxamt,days,files,date)values('".$_POST['p_name']."','".$_POST['cate_id']."','".$_POST['skill_id']."','".$_POST['details']."','".$_POST['minamt']."','".$_POST['maxamt']."','".$_POST['days']."','".$_POST['myfile']."',now())");

}
?>