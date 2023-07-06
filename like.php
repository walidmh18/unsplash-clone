 <?php 

 extract($_POST);

 $data = '';
 foreach ($_POST as $k => $v) {
   if (empty($data)) {
      $data .= "$k";
   } 
   
 }
 include('connection.php');
 session_start();
 
 if (isset($_SESSION['username']) ) {
    
     $username = $_SESSION['username'];
      $postID = $data;
      $likesSql = "SELECT * FROM likes WHERE username='$username' and post_id='$postID'";

      $result = mysqli_query($con , $likesSql);
      $likesRow = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $likedByUserCount = mysqli_num_rows($result);
   
     
     if ($likedByUserCount > 0 ) {
       $unlikeSql = "DELETE FROM likes WHERE post_id='$postID' and username='$username'";
       $unlikeResult = $con->query($unlikeSql);

       $prevLikesCount = $con->query("SELECT likes FROM posts WHERE id='$postID'");
       while ($row = $prevLikesCount->fetch_assoc()) {
          $newLikesCountn = $row['likes'] - 1;
         
       }

       $newLikesCount = $con->query("UPDATE posts SET likes='$newLikesCountn' WHERE id='$postID'");

     }else{
       $likeSql = "INSERT INTO likes (post_id,username) VALUES ('$postID','$username')";
       $likeResult = $con->query($likeSql);
      
       $prevLikesCount = $con->query("SELECT likes FROM posts WHERE id='$postID'");
       while ($row = $prevLikesCount->fetch_assoc()) {
          $newLikesCountn = $row['likes'] + 1;
         
       }

       $newLikesCount = $con->query("UPDATE posts SET likes='$newLikesCountn' WHERE id='$postID'");

     }
   } else {
      header("Location: login?error=Please login first to be able to add a photo&act=login");
      exit();
   }


 ?>