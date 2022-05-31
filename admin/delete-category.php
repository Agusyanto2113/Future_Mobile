<?php 
    //include constants file
    include('../database/DBController.php'); 
    //check whether the id and image name value is set or not 
    //echo "delete page";
    if(isset($_GET['id']) AND isset($_GET['images']))
    {
        //get the value and delete
        $id = $_GET['id'];
        $images = $_GET['images'];
        

        //Remove the physhical image file is available
        if($images != "")
        {
            //Image is available. so remove it 
            $path ="../assets/category/".$images;
            //remove the image 
            $remove = unlink($path);

            //if failed to remove the image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'> Failed to remove the category image.</div>";
                //redirect to the manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die(); 
            }
        }

        //Delete data from database 
        //SQL query to delete data from database
        $sql = "DELETE FROM category WHERE category_id=$id";

        //Execute the Query
        $res= mysqli_query($conn,$sql);

        //Check whether the data is delete from database or not 
        if($res==true)
        {
            //set success message and redirect 
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }else 
        {
            //set failed message and redirect 
            $_SESSION['delete'] = "<div class='error'>Failed to delete Category</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');

        }
    }else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>