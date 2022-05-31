<?php include('patials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Description</h1>
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
                $description = $row['description'];
                $ram1 = $row['RAM1'];
                $ram2 = $row['RAM2'];
                $ram3 = $row['RAM3'];
                $ram4 = $row['RAM4'];
            }else
            {
                //redirect to manage-category with session message
                $_SESSION['no-category-found'] = "<div class='error'> Product Not Found </div>";
                header('location:'.SITEURL.'admin/manage-product.php');
            }
        }else
        {
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-product.php');
        }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-100">
        <?php
       // echo $ram1;
      //  echo $ram2;
      //  echo $ram3;
      //  echo $ram4;
        ?>
          <tr>
              <td>Description:</td>
              <td>
                  <textarea name="description-origin" READONLY cols="100" rows="10" class="desc-admin"><?php echo $description; ?></textarea>
              </td>
          </tr>

          <tr>
              <td>New Description:</td>
              <td>
                  <textarea name="description" cols="100" rows="10" class="desc-admin"></textarea>
              </td>
          </tr>
          <tr>
                <td>RAM SPEC:</td>
                <td>
                  RAM2 :
                  <input <?php if($ram1=="2GB"){echo "checked";} ?> type="radio" name="ram1" value="2GB">Yes
                  <input <?php if($ram1==""){echo "checked";} ?> type="radio" name="ram1" value="">No
                </td>
                
          </tr>
          
          <tr>
                <td>RAM SPEC:</td>
                <td>
                  RAM4 :
                  <input <?php if($ram2=="4GB"){echo "checked";} ?> type="radio" name="ram2" value="4GB">Yes
                  <input <?php if($ram2==""){echo "checked";} ?> type="radio" name="ram2" value="">No
                </td>
                
          </tr>
            
          <tr>
                <td>RAM SPEC:</td>
                <td>
                  RAM6 :
                  <input <?php if($ram3=="6GB"){echo "checked";} ?> type="radio" name="ram3" value="6GB">Yes
                  <input <?php if($ram3==""){echo "checked";} ?> type="radio" name="ram3" value="">No
                </td>
                
          </tr>

          <tr>
                <td>RAM SPEC:</td>
                <td>
                  RAM6 :
                  <input <?php if($ram4=="8GB"){echo "checked";} ?> type="radio" name="ram4" value="8GB">Yes
                  <input <?php if($ram4==""){echo "checked";} ?> type="radio" name="ram4" value="">No
                </td>
                
          </tr>

          <tr>

            <td cols="">   
              <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                $current_desc = $_POST['description-origin'];
                $description =$_POST['description'];
               
                if(isset($_POST['ram1']))
                  {
                    //get the value from form
                    $ram1 = $_POST['ram1'];
                  }else
                  {
                    //set the default value
                    $ram1 = "";
                  }

                if(isset($_POST['ram2']))
                {
                  //get the value from form
                  $ram2 = $_POST['ram2'];
                }else
                {
                  //set the default value
                  $ram2 = "";
                }

                if(isset($_POST['ram3']))
                {
                  //get the value from form
                  $ram3 = $_POST['ram3'];
                }else
                {
                  //set the default value
                  $ram3 = "";
                }

                if(isset($_POST['ram4']))
                {
                  //get the value from form
                  $ram4 = $_POST['ram4'];
                }else
                {
                  //set the default value
                  $ram4 = "";
                }

                if($description !=""){
                  $sql2 = "UPDATE product set
                  RAM1 = '$ram1',
                  RAM2 = '$ram2',
                  RAM3 = '$ram3',
                  RAM4 = '$ram4',
                  description = '$description'
                 
                  WHERE item_id = $id
                  ";

                  echo $sql2;

                  $res = mysqli_query($conn,$sql2);
                }else{
                  $sql2 = "UPDATE product set
                  RAM1 = '$ram1',
                  RAM2 = '$ram2',
                  RAM3 = '$ram3',
                  RAM4 = '$ram4'
                  WHERE item_id = $id
                  ";

                  echo $sql2;

                  $res = mysqli_query($conn,$sql2);
                }

                  if($res == true)
                    {
                    //Category Update 
                    $_SESSION['update'] = "<div class='success'>Description Updated Successfully!.</div>";
                    header('location:'.SITEURL.'admin/manage-product.php');
                    }else
                   {
                    //Failed to Update category
                    $_SESSION['update'] = "<div class='error'>Failed to update Description!.</div>";
                    header('location:'.SITEURL.'admin/manage-product.php');
                    }
                  
            }
      ?>
    </div>
</div>

<?php include('patials/footer.php'); ?>