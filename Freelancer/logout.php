<?php
  session_start();
  session_destroy();
  header("location:defaulthome1.php");
?>