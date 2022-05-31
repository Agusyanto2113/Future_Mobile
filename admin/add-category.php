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
                    <input type="text" name="title" placeholder="Category Title" class="admintable">
                </td>
            </tr>

            <tr>
                <td>Brand:</td>
                <td>
                  <select name="brand" id="brand"  require class="admintable text-center">
                  <option value="" class="admintable" name="brand">--  Pilih  --</option>
                  <?php
                    $sql = mysqli_query($conn, "SELECT * FROM tb_brand") or die(mysqli_error($conn));
                    while($brand = mysqli_fetch_array($sql)){
                      echo '<option value="'.$brand['id_brand'].'" class="admintable">'.$brand['brand_name']??"".'</option>';
                    }
                  ?>
                  </select>
                </td>
            </tr>
            
            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image">
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
                    <input type="date"  name="date" class="admintable">
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
            $title = $_POST['title'];
            $brand = $_POST['brand'];
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
                    $image_name = "Category_img_".rand(000,999).'.'.$ext; //e.g Food_category_834.jpg

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../assets/category/".$image_name;

                    //Finally upload the image 

                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not 
                    // and if the image is not uploaded the we will stop the process and redirect with error message 
                    if($upload ==false)
                    {
                        //Set Message 
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image </div>";
                        //Redirect to add category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //Stop the Proccess
                        die();
                    }
                }
            }else
            {
                //Don't Upload the image and set the image_name value as blank
                $image_name = "";
            }
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

            $auditor = $_POST['auditor'];
            $date = $_POST['date'];
            //2. Crate SQL Query to insert category into database
            $sql = "INSERT INTO category SET 
                name = '$title',
                brand = '$brand',
                images = '$image_name',
                auditor = '$auditor',
                date = '$date',
                featured = '$featured',
                active = '$active'
            ";

            //3. Execute the query and save in the database 

            $res = mysqli_query($conn, $sql);

            //4.check whether the query is execute or not and data added or not 
            if($res == true)
            {
                // Query Executed and Category Added
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
            }else
            {
                //Failed to add Category 
                $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/add-catogory.php');
            }


        }
        ?>
    </div>
</div>

<?php include('patials/footer.php');?>