<?php 

include('connection.php');

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   // checking if username is valid

   $sql = "select * from users where username='$username'";
   $result = mysqli_query($con , $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $usernameCount = mysqli_num_rows($result);




   if (empty($username)|| empty($password) || empty($email)) {
      header("Location:login?error=All fields are required&act=signup");
      exit();
   } else {
      if ($usernameCount > 0) {
      header("Location:login?error=username already used&act=signup");
   } else if ($usernameCount ===0) {
      $newUserSql = "INSERT into users (username,email,password) VALUES('$username','$email','$password')";
      $newUserResult=$con->query($newUserSql);

      header("Location:login?act=login");
      exit();
   }
      
   }





   




} else {
   header("Location: login");
   exit();
}






?>