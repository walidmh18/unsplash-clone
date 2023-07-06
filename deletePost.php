<?php
include('connection.php');
session_start();

if (isset($_POST['password'])) {
   $password = $_POST['password'];
   $id = $_GET['id'];

   if ($password == $_SESSION['password']) {
      
      $sql="DELETE FROM posts WHERE id=$id";
      $rs = $con->query($sql);
      header("Location:index.php");

   }else if (empty($password)) {
      header("Location:index.php?error=Password is required.&act=deletePost");
      exit();
   }else {
      header("Location:index.php?error=Wrong password, try again.&act=deletePost");
      exit();

   }
   

}




?>