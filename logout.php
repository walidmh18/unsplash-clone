<?php 
session_start();
if (isset($_POST['password'])) {
   $password = $_POST['password'];
   if ($password == $_SESSION['password']) {
      
      session_destroy();
      header("Location: index.php");
      exit();
   } else if (!empty($_POST['password']) && $password != $_SESSION['password']) {
      # code...
   
      header("Location: index.php?error=wrong password&logoutStat=failed&act=logout");
      exit();
   }else if (empty($_POST['password'])) {
      header("Location: index.php?error=Password is required&logoutStat=failed&act=logout");
      exit();
   }
} else {
   header("Location: index.php?error=Password is required&logoutStat=failed&act=logout");
      exit();
}



// session_destroy();
// header("Location: index.php");
// exit();
?>