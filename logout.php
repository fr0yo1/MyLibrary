<?php
   session_start();
   unset($_SESSION['username']); 
   unset($_SESSION['user_id']); 
   $_SESSION["islogged"] = false;
   header("Location: index.php");
?>
