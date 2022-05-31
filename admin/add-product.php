<?php include('patials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>
        <!-- Add Category Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" placeholder="Product Title" class="admintable">
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" cols="30" rows="10" placeholder="Description of the Product"></textarea>
                </td>
            </tr>

            
            
            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            
            <tr>
                <td>Brand:</td>
                <td>
                <select name="brand"  class="admintable">
                <?php
                //Create PHP Code to display categories from database
                //1.Create Sql to get all active categories from database 
                $sql = "SELECT * FROM category WHERE active ='Yes' ";
                //Executing Query
                $res = mysqli_query($conn, $sql);
                //Count Rows to check whether we have categories or not
                $count = mysqli_num_rows($res);
               //IF count is greater than zero, we have categories else we do not have categories 
                if($count>0)
                {
                //We have categories 
                while($row = mysqli_fetch_assoc($res))
                {
                //get the details of categories 
                $id = $row['brand'];
                $namecategory = $row['name'];
                ?>
                <option value="<?php echo $namecategory;?>"><?php echo $namecategory; ?></option>
                <?php
                }
                }else
                  {
                  //We do not have categories 
                  ?>
                    <option value="0">No Category Found</option>
                  <?php
                 }
                //2.Display on Dropdown
                ?>
                </select>
              </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" placeholder="Product Price" class="admintable">
                </td>
            </tr>

            <tr>
                <td>Auditor:</td>
                <td>
                    <input type="text" name="auditor" placeholder="Auditor" value=" <?php echo $_SESSION['user']??""; ?> " readonly class="admintable">

                </td>
            </tr>
            <tr>
                <td>Date :</td>
                <td>
                  
                    <input type="text" readonly value= "<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s"); ?>" name="date" class="admintable">
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>
        <!-- Add Category Form Ends -->
        <?php
        //check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //1.get the value from  category form 
            $name = $_POST['name'];
            $description = $_POST['description'];
            // for the radio input ,we need to check whether the button is selected or not 
            //check whether the image is selected or not and set the value for image name accoridingly
            //print_r($_FILES['image']);
            //die(); //Break the code here 
            if(isset($_FILES['image']['name']))
            {
                //Upload the Image
                //to upload image we need image name ,source path and destination path
                $image_name = $_FILES['image']['name'];
                //upload the iamge only if image is selected
                if($image_name !="")
                {
                    //Auto Rename our Image 
                    //Get the Extension of our image (jpg,png,gif,etc)e.g "special.food.jpg"
                    $ext = end(explode('.',$image_name));
                    //Rename the image 
                    $image_name = "Product_img_".rand(000,999).'.'.$ext; //e.g Food_category_834.jpg

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../assets/product/".$image_name;

                    //Finally upload the image 

                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not 
                    // and if the image is not uploaded the we will stop the process and redirect with error message 
                    if($upload ==false)
                    {
                        //Set Message 
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image </div>";
                        //Redirect to add category page
                        header('location:'.SITEURL.'admin/add-product.php');
                        //Stop the Proccess
                        die();
                    }
                }
            }else
            {
                //Don't Upload the image and set the image_name value as blank
                $image_name = "";
            }
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $auditor = $_POST['auditor'];
            $date = $_POST['date'];
            /////////////////////////////////////////////////
            if(isset($_POST['featured']))
            {
                //get the value from form
                $featured = $_POST['featured'];
            }else
            {
                //set the default value
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }else{
                $active ="No";
            }
            //2. Crate SQL Query to insert category into database
            $sql = "INSERT INTO product SET 
                item_brand = '$brand',
                item_name = '$name',
                item_price = '$price',
                item_image = '$image_name',
                item_register = '$date',
                featured = '$featured',
                active = '$active',
                description = '$description',
                auditor = '$auditor'
            ";

            //3. Execute the query and save in the database 

            $res = mysqli_query($conn, $sql);

            //4.check whether the query is execute or not and data added or not 
            if($res == true)
            {
                // Query Executed and Category Added
                $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-product.php');
            }else
            {
                //Failed to add Category 
                $_SESSION['add'] = "<div class='error'>Failed to add Product.</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/add-product.php');
            }
        }
        ?>
    </div>
</div>

<?php include('patials/footer.php');?>