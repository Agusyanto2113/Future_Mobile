<?php include('../database/dbcontroller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Future Mobile</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="main-container">
    <div class="login">
        <h1 class="text-center">LOGIN</h1>
        <br><br>

        <?php
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
        <br><br>

        <!-- Login Form Start here -->
        <form action="" method="POST" class="text-center ">
            USERNAME <br><br>
              <input class="input" type="text" name="username" placeholder="Enter Your Username">
              <br><br>
            PASSWORD <br><br>
              <input class="input" type="password" name="password" placeholder="Enter Your Password">
              <br><br>
            <input  class="btn-input" type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        <!-- Login Form End Here -->
        <br>
        <p class="text-center">Created By  - Kelompok 1</p>
    </div>    

</body>
</html>

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
            header('location:'.SITEURL.'admin/');
        }else
        {
            //user not available and login failed
            $_SESSION['login'] = "<div class='error text-center'> Username and Password did not Match. </div>";
            //redirect to the page dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>