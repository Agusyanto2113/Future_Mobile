<?php 

include './database/DBController.php';

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="stylelogin.css">

	<title>Register Form - Future Mobile</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
        <?php
            if(isset($_SESSION['register']))
            {
            echo $_SESSION['register'];
            unset ($_SESSION['register']);
            }

            if(isset($_SESSION['no-login-message']))
            {
            echo $_SESSION['no-login-message'];
            unset ($_SESSION['no-login-message']);
            }
        ?>
      <div class="input-group">
				<input type="text" placeholder="Full Name" name="full_name" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>

<?php 
if (isset($_POST['submit'])) 
{
  $full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

if ($password == $cpassword) {
		$sql = "SELECT * FROM tbl_admin WHERE gmail='$email'";
		$result = mysqli_query($conn, $sql);

      if (!$result->num_rows > 0) {
      $sql2 = "INSERT INTO tbl_admin SET 
      full_name = '$full_name',
      username = '$username',
      gmail = '$email',
      password = '$password'";
      $result2 = mysqli_query($conn, $sql2);

      if($result2==TRUE){
        $_SESSION['register'] = "<div class='success text-center'> Login Successfully. </div>";
        //redirect to the page dashboard
        header('location:'.SITEURL.'login.php');
      }

      } 
      else{
      //user not available and login failed
      $_SESSION['register'] = "<div class='error text-center'>You email already Used!</div>";
      //redirect to the page dashboard
      header('location:'.SITEURL.'register.php');
      }
    }
    else {

      //user not available and login failed
      $_SESSION['register'] = "<div class='error text-center'>Your Password Not Match</div>";
      //redirect to the page dashboard
      header('location:'.SITEURL.'register.php');
     }

}
?>
</body>
</html>