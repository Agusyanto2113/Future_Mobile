<?php
    //include constants
    include('../database/DBController.php'); 
    //echo "Deleted Product"; 

    if(isset($_GET['id']) && isset($_GET['item_image'])) // Either use '&&' or 'AND'
    {
        //Process to delete 
        //echo "Press Delete";

        //1.Get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['item_image'];

        //2.Remove the image if available 
        //Check whether the image is available or not and delete only if available 
        if($image_name !="")
        {
            //IF has image and need to remove from folder
            //Get the image path 
            $path = "../assets/product/".$image_name;

            //Remove image file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not 
            if($remove ==false)
            {
                //Failed to remove iamge 
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                //Redirect to manage food
                header('location:'.SITEURL.'admin/manage-product.php');
                //Stop the proccess of deleting food 
                die();
            }
        }

        //3.Delete Food From database 
        $sql = "DELETE FROM product WHERE item_id = $id";
        //Execute the Query 
        $res = mysqli_query($conn,$sql);

        //Check whether the query executed or not and set the session message respectively
        //4.Redirect to manage food with session message 
        if($res==true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Product Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }else
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Product </div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
    }else
    {
        //Redirect to manage food page 
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access. </div>";
        header('location:'.SITEURL.'admin/manage-product.php');
    }
?>