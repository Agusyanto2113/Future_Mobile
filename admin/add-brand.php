<?php include('patials/menu.php');?>


<?php
//Process the value and save to the database
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
   //get data form form
   $brand = $_POST['brand_name'];
   //SQL Query
   $sql = "INSERT INTO tb_brand SET 
    brand_name = '$brand'";

    //execute query and saving data into database 
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //check whether the (Query is executed) data is inserted or not  and display appropriate message

    if($res==TRUE)
    {
      // echo "Data Inserted";
        $_SESSION['add'] = "Brand added Successfully";
        //Rediredt Page manage admin

        header("location:".SITEURL.'admin/manage-brand.php');

    }else
    {
      // echo "failed to insert data";
      $_SESSION['add'] = "Failed to add Brand";
        //Rediredt Page add admin

        header("location:".SITEURL.'admin/add-brand.php');
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Brand</h1>
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
                    <td>Brand Name:</td>
                    <td>
                        <input type="text" name="brand_name" class="admintable" placeholder="Enter Your Brand">
                    </td>
                </tr>
               

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Brand" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('patials/footer.php'); ?>