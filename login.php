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

	<title>Future Mobile Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <?php
        if(isset($_SESSION['register']))
        {
            echo $_SESSION['register'];
            unset ($_SESSION['register']);
        }

        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }

        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset ($_SESSION['no-login-message']);
        }
        ?>
			<div class="input-group">
				<input type="username" placeholder="username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>

  <?php
    //check whether the submit button is clicked or not 
    if(isset($_POST['submit']))
    {
        //process for login
        //1.get the data from login form
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn,$raw_password);

        //2. Query the check whether the user with username and password exists or not 
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login'] = "<div class='success'> Login Successfully. </div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it 
            //redirect to the page dashboard
            header('location:'.SITEURL.'index_log.php');
        }else
        {
            //user not available and login failed
            $_SESSION['login'] = "<div class='error text-center'> Username and Password did not Match. </div>";
            //redirect to the page dashboard
            header('location:'.SITEURL.'login.php');
        }
    }
  ?>
</body>
</html>