<?php
include('../connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1,
  maximum-scale=5"
    />

    <link rel="icon" href="devchallenges.png" />

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="https://devchallenges.io/"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style.css">

    <title>login - sign up</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>
    
 
<div class="container
<?php 
if (isset($_GET["act"])) {
   if ($_GET["act"] == 'signup') {
      ?>right-panel-active<?php
   } 
   
}

?>

" id="container">
<div class="form-container sign-up-container">

<form action="../signup.php" method="POST">
	<h1>Create Account</h1>
	<?php 
      if (isset($_GET['error']) && $_GET["act"] == 'signup') {
         ?>
         <p class="errormessage">
         <?php
            echo $_GET['error'];
         ?></p><?php
      }?>
	<span>or use your email for registration</span>
	<input type="text" name="username" placeholder="Username">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button>SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="../login.php" method="POST">
		<h1>Sign In</h1>
		<?php 
      if (isset($_GET['error']) && $_GET["act"] == 'login') {
         ?>
         <p class="errormessage">
         <?php
            echo $_GET['error'];
         ?></p><?php
      }?>
	<span>or use your account</span>
	<input type="username" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="Password">
	<a href="#">Forgot Your Password</a>

	<button>Sign In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Friend!</h1>
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


    
</body>
</html>
