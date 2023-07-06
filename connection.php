<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'unsplash_website';

$con = new mysqli($hostname,$username,$password,$dbname);

if($con->connect_error){
   die("connection failed".$con->connect_error);
   }




?>