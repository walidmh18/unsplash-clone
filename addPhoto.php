<?php 
include('connection.php');
session_start();

if(!$_SESSION['username']){
   header("Location: login?error=Please login first to be able to add a photo&act=login");
   exit();
}else if (!isset($_POST['URL']) || empty($_POST['URL'])) {
   header("Location: index.php?error=Photo url and description are required&act=add photo");
   exit();
}



else if (isset($_SESSION['username']) || $_SESSION['username']!= '') {
   
   if (isset($_POST['description']) && isset($_POST['URL'])) {
      $username = $_SESSION['username'];
      $description = $_POST['description'];
      $url = $_POST['URL'];
      
      
      if (@exif_imagetype($url) != null && !empty($description)) {
         $sql = "INSERT into posts (username,image_url,description) values ('$username','$url','$description')";
         $result = mysqli_query($con,$sql);
         
         header("Location:index.php");
         exit();


      } else if(empty($description)){
         header("Location: index.php?error=please Describe your photo&act=add photo");
         exit();
      }else{
         header("Location: index.php?error=Photo url and description are required&act=add photo");
         exit();
      }}

      else{
         header("Location: index.php?error=Photo url and description are required&act=add photo");
         exit();
      }
      


      



   }






?>