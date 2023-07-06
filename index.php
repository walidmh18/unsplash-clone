<?php session_start(); 
include('connection.php');
function includeHeader($pos){
  include('header.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1,
  maximum-scale=5" />
  <link rel="icon" href="devchallenges.png" />
  <link rel="shortcut icon" type="image/x-icon" href="https://devchallenges.io/" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css">
  <title>Devchallenges</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js" integrity="sha512-jEnuDt6jfecCjthQAJ+ed0MTVA++5ZKmlUcmDGBv2vUI/REn6FuIdixLNnQT+vKusE2hhTk2is3cFvv5wA+Sgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="deletePost.js" defer></script> -->
  <script src="index.js" defer></script>
  

</head>

<body>

 <?php includeHeader('') ?>

  <form action="logout.php" method="post" id="logoutForm" class="popupForm"
  style="<?php 
  if (isset($_GET['logoutStat']) && isset($_GET['act']) && $_GET['act'] == 'logout') {
    if ($_GET['logoutStat'] == 'failed') {
      ?> display: grid; <?php
    }
  }
  ?>
  
  "
  >
    <div class="container">

      <h1>Are you sure you want to logout?</h1>
       <?php   
        if (isset($_GET['error']) && isset($_GET['act']) && $_GET['act'] == 'logout') {
          ?>
          <p class="errormessage">
            <?php echo $_GET['error'] ?>
          </p>
          <?php
        }
       ?>                                             


      <label for="password">enter your password first</label>
      <input type="password" name="password" placeholder="password"> 
      
      <div class="actionsBtns">
      <button type="submit">Logout</button>
      <button type="reset" onclick="closeLogout()">Cancel</button>

      </div>
    </div>
  </form>


  <form action="addPhoto.php" method="post" class="popupForm" id="addNewPhotoForm"
  style="
  <?php
  if (isset($_GET['act']) && $_GET['act'] == 'add photo') {
    ?> display: grid; <?php
  }else{
    ?> display: none; <?php
  }

?>">
        <div class="container">
          <h1>Add a new photo</h1>
          <?php   
        if (isset($_GET['error'])) {
          ?>
          <p class="errormessage">
            <?php echo $_GET['error'] ?>
          </p>
          <?php
        }
       ?>     

          <label for="description">Description:</label>
          <input type="text" min="10" max="100" name="description" id="description" placeholder="Describe your photo">


          <label for="photoUrl">Photo URL:</label>
          <input type="text" name="URL" id="URL" placeholder="www.example.com/photo12">
          <div class="actionsBtns">
            <button type="submit">Submit</button>
            <button type="reset" onclick="closeAddPhoto()">Cancel</button>

          </div>
        </div>



  </form>

<!-- 
  <script>
   function deletePost(id){
  const deletePostForm = document.querySelector('#deletePostForm')
   deletePostForm.setAttribute('action', `deletePost.php?id=${id}`)
   deletePostForm.style.display = 'grid'

}
</script> -->

  <form action="" method="post" id="deletePostForm" class="popupForm"
  style="
  <?php 
    if ( isset($_GET['act']) && $_GET['act'] == 'deletePost') {
        ?> display: grid; <?php
    }
  
  ?>
  
  "
  >
    <div class="container">

      <h1>Are you sure you want to delete this post?</h1>
       <?php   
        if (isset($_GET['error']) && isset($_GET['act']) && $_GET['act'] == 'deletePost') {
          ?>
          <p class="errormessage">
            <?php echo $_GET['error'] ?>
          </p>
          <?php
        }
       ?>                                             


      <label for="password">enter your password first</label>
      <input type="password" name="password" placeholder="password"> 
      
      <div class="actionsBtns">
      <button type="submit">delete</button>
      <button type="reset" onclick="closeDeletePost()">Cancel</button>

      </div>
    </div>
  </form>



  <div class="gridContainer column">
<?php
$sql = "SELECT * FROM posts";
$allPosts = $con->query($sql);

if (isset($_SESSION['username'])) {
  $currentUsername = $_SESSION['username'];
  $likesSql = "SELECT * FROM likes WHERE username='$currentUsername'";
  $allLikes = $con->query($likesSql);
}

$index = 1
?>
  
  
  
  
    <?php
    while ($row = mysqli_fetch_assoc($allPosts)) {?>
    <div class="img" id="<?php echo $row['id'] ?>" >
      <img src="<?php echo $row['image_url']; ?>" alt="">
      <div class="overlay">
        <div class="top">
          <a href="user?username=<?php echo $row['username'] ?>" class="username"><?php echo $row['username']; ?></a>
          <?php 
            if ( isset($_SESSION['username']) && $_SESSION['username'] == $row['username']) {
              ?> <button onclick="deletePost(<?php echo $row['id'] ?>)" id="deletePostBtn" class="deletePostBtn">delete</button> <?php
            }
          ?>
        </div>
        <div class="bottom">
          <h3 class="title"><?php echo $row['description']; ?></h3>
          <button id="<?php echo $row['id'] ?>"
          class="likeBtn 
          <?php 

            
          if (isset($_SESSION['username']) && $row['likes']>0) {
            $currentUsername = $_SESSION['username'];
            $postID = $row['id'];
            $likesSql = "SELECT * FROM likes WHERE username='$currentUsername' and post_id='$postID'";

            $result = mysqli_query($con , $sql);
            $likesRow = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $likedByUserCount = mysqli_num_rows($result);
          
              
              if ($likedByUserCount > 0 ) {
                echo 'active';
              }else{
                echo '';
              }

              };?>"
              <?php 
              if (!isset($_SESSION['username'])) {
                ?> onclick="goTologinPage();" <?php
              }
              
              ?>
               
            ></button>
        </div>
      </div>
    </div>
    
    <?php } ?>
      
      <div class="temp"></div>

  </div>



  <script>
    $(document).ready(function() {

      $('.likeBtn').click(function(e){
        
        // e.preventDefault()
        $.ajax({
          url: 'like.php',
          data: this.id,
          method: 'POST',
          success: function (res) {
            $('.temp').html(res)
            
          }
        })
      })
    })
  </script>  
</body>

</html>