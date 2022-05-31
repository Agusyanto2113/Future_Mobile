<?php

include('../database/DBController.php'); 

// get the id of admin to be delete
$id = $_GET['id'];

// create sql query to be delete admin
$sql = "DELETE FROM tb_brand WHERE id_brand= $id";

//execute the query 
$res= mysqli_query($conn, $sql);

// redirect to manage admin page with message 

if($res==TRUE)
{
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success' >Brand Delete Successfully!</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-brand.php');

}else
{
    //create session variable to display message
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Brand,Try Again Later.</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-brand.php');
}
?>