<?php 
include("connection.php");
session_start();

if (isset($_POST['username'])&&isset($_POST['password'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "select * from users where username='$username' and password='$password'";

   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);

   if (empty($username)|| empty($password)) {
      header("Location:login?error=username and password are required&act=login");
      exit();
   } else {
      if ($count === 1) {

         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         header("Location: index.php");
      } else {
         header("Location:login?error=wrong username or password&act=login");
      }
      
   }
   
} else {
   header("location: login");
   exit();
}

?>