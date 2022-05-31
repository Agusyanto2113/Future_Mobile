<?php include('patials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        //check whether the id is set or not 
        if(isset($_GET['id']))
        {
            //get the id and all other details 
            //echo "Getting the data"
            $id = $_GET['id'];
            //Create SQL Query to get all others details
            $sql = "SELECT * FROM product WHERE item_id=$id";
            //Execute the SQL
            $res = mysqli_query($conn, $sql);
            //Count the rows to check whether the id is valid or not 
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                //Get all data
                $row = mysqli_fetch_assoc($res);
                $name = $row['item_name'];
                $brand = $row['item_brand'];
                $price = $row['item_price'];
                $post_price = $row['post_price'];
                $current_image = $row['item_image'];
                $auditor = $row['auditor'];
                $date = $row['item_register'];
                $featured = $row['featured'];
                $active = $row['active'];
                
            }else
            {
                //redirect to manage-category with session message
                $_SESSION['no-category-found'] = "<div class='error'> Category Not Found </div>";
                header('location:'.SITEURL.'admin/manage-product.php');
            }
        }else
        {
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-product.php');
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="admintable">
                </td>
            </tr>

            <tr>
                <td>Brand:</td>
                <td>
                  <select name="brand" id="brand"  require class="admintable text-center" require>
                  <option value="" class="admintable" name="brand" require><?php echo $brand ?></option>
                  <?php
                    $sql = mysqli_query($conn, "SELECT * FROM tb_brand") or die(mysqli_error($conn));
                    while($brand = mysqli_fetch_array($sql)){
                      echo '<option value="'.$brand['brand_name'].'"  class="admintable">'.$brand['brand_name']??"".'</option>';
                    }
                  ?>
                  </select>
                </td>
            </tr>

            <tr>
                <td>Current Image:</td>
                <td>
                    <?php

                    if($current_image !="")
                    {
                        //Display the image
                        ?>
                        <img src="<?php echo SITEURL; ?>./assets/product/<?php echo $current_image; ?>"width ="150px" class="img-admin">
                        <?php
                    }else
                    {
                        //Display Message
                        echo "<div class='error'> Image Not Added </div>";
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image:</td>
                <td>
                    <input type="file" name="image" > 
                </td>
            </tr>

            <tr>
                <td>Auditor:</td>
                <td>
                    <input type="text" name="auditor" value="<?php echo $auditor; ?>" readonly class="admintable">
                </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" class="admintable" value="<?php echo $price ?>">
                </td>
            </tr>
            <tr>
                <td>Post Price :</td>
                <td>
                    <input type="number"  name="post_price" class="admintable" value="<?php echo $post_price?>">
                </td>
            </tr>

            


            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
                <td>   
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="update_date" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>    

        <?php
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //1.Get All the Values from our form
                $id = $_POST['id'];
                $name =$_POST['name'];
                $brand = $_POST['brand'];
                $current_images = $_POST['current_image'];
                //2.Updating New Image if Selected 
                //Check whether the image is selected or not 
                if(isset($_FILES['image']['name']))
                {
                    //Get the image Details
                    $images = $_FILES['image']['name'];

                    //check whether the image is available or not 
                    if($images != "")
                    {
                        //Image Available
                        //A.Upload image 

                        //Auto Rename our Image 
                        //Get the Extension of our image (jpg,png,gif,etc)e.g "special.food.jpg"

                        $ext = explode('.',$images);
                        echo end($ext);
                        $extension= array($ext);
                        //Rename the image 
                        $images = "Product_img_".rand(000,999).'.'.$extension; //e.g Food_category_834.jpg

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../assets/product/".$images;

                        //Finally upload the image 

                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not 
                        // and if the image is not uploaded the we will stop the process and redirect with error message 
                        if($upload ==false)
                        {
                            //Set Message 
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image </div>";
                            //Redirect to add category page
                            header('location:'.SITEURL.'admin/manage-product.php');
                            //Stop the Proccess
                            die();
                        }

                        //B.Remove the current image if available
                        if($current_image !="")
                        {

                            $remove_path = "../assets/product/".$current_image;
                            $remove = unlink($remove_path);
                            //check the image is remove or not 
                            //Failed to remove image the display the message and stop the process
                            if($remove == false)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove the current image</div>";
                                header('location:'.SITEURL.'admin/manage-product.php');
                                die();//Stop the process
                            }
                        }

                        
                    }else
                    {
                        $images = $current_image ;    
                    }

                }else
                {
                    $images = $current_image ;
                }
                $auditor = $_POST['auditor'];
                $date = $_POST['update_date'];
                $post_price = $_POST['post_price'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $price = $_POST['price'];


                //3.Update the Database
                $sql2 = "UPDATE product SET
                    item_name = '$name',
                    item_brand = '$brand',
                    item_image = '$images',
                    item_price = '$price',
                    post_price = '$post_price',
                    auditor = '$auditor',
                    item_register = '$date',
                    featured = '$featured',
                    active = '$active'
                    WHERE item_id = $id
                ";

            //   echo $name;   
            //  echo $brand;  
            //   echo $images;  
            //   echo $auditor;  
            //   echo $date;  
            //  echo $featured;  
            //   echo $active;
            //   echo $id;
                //Execute the Query 
                $res2 = mysqli_query($conn,$sql2);

                //4.Redirect to manage-category.php with massage 
                //Check whether Execute or not
               if($res2 == true)
               {
                  //Category Update 
                   $_SESSION['update'] = "<div class='success'>Product Updated Successfully!.</div>";
                   header('location:'.SITEURL.'admin/manage-product.php');
                }else
                {
                    //Failed to Update category
                  $_SESSION['update'] = "<div class='error'>Failed to update Product!.</div>";
                  header('location:'.SITEURL.'admin/manage-product.php');
                }
            }
        ?>
    </div>
</div>


<?php include('patials/footer.php'); ?>
