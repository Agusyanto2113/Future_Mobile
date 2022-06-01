<?php include('patials/menu.php');?>


<?php

//Process the value and save to the database

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
   //get data form form
   $full_name = $_POST['full_name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $date = $_POST['date'];
//   $result = explode('-',$dob);
//   $date = $result[2];
//   $month = $result[1];
//   $year = $result[0];
//   echo $new = $date.'-'.$month.'-'.$year;
   $password = md5($_POST['password']); //Pass Encryption with MD5

   //SQL Query
   $sql = "INSERT INTO tbl_admin SET 
    full_name = '$full_name',
    username = '$username',
    gmail = '$email',
    DOB = '$date',
    password = '$password',
    role = '$username',
    status = 'active'
   ";

    //execute query and saving data into database 
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //check whether the (Query is executed) data is inserted or not  and display appropriate message

    if($res==TRUE)
    {
      // echo "Data Inserted";
        $_SESSION['add'] = "Admin added Successfully";
        //Rediredt Page manage admin

        header("location:".SITEURL.'admin/manage-admin.php');

    }else
    {
      // echo "failed to insert data";
      $_SESSION['add'] = "Failed to add Admin";
        //Rediredt Page add admin

        header("location:".SITEURL.'admin/add-admin.php');
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset ($_SESSION['add']); //Remove Session Message
                }
            ?>
        <br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" class="admintable" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" class="admintable" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Email :</td>
                    <td>
                        <input type="text" name="email" class="admintable" placeholder="Enter Your Email">
                    </td>
                </tr>
                
                <tr>
                    <td>Date of Birth :</td>
                    <td>
                        <input type="date"  name="date" class="admintable">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" class="admintable" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('patials/footer.php');?>

