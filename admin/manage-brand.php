<?php include('patials/menu.php');?>
<!-- Main Content Section Start -->
<div class="main-content">
        <div class="wrapper">
            <h1>Manage Brand</h1>
            <br>
            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset ($_SESSION['add']); //Remove Session Message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //Display Session Message
                    unset ($_SESSION['delete']); //Remove Session Message
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                } 

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset ($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset ($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset ($_SESSION['change-pwd']);
                }
            ?>

            <br>
            <br>
            <!-- Button Add Admin-->
            <a href="add-brand.php" class="btn-primary">Add Brand</a>
            </br>
            </br>
            </br>   
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Brand Name</th>
                    <th>Actions</th>
                </tr>

                <?php

                //Get All Admin
                $sql = "SELECT * FROM tb_brand";
                //Execute Query
                $res = mysqli_query($conn, $sql);

                //checking whether the query is executed of not
                if($res==TRUE)
                {
                    //count rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res); //Function to get all the rows in database

                    $sn=1; //create a variable and assign the value 

                    //check the num of rows
                    if($count>0)
                    {
                        //we have data in data base 
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //using loop to get all the data from database 
                            //and while loop will run as long as we have data in database

                            //get individual data

                            $id = $rows['id_brand'];
                            $brand = $rows['brand_name'];

                            //display the value in our table 
                            ?>
                                <tr>
                                    <td><?php echo $sn++;?>.</td>
                                    <td><?php echo $brand;?></td>
                                    
                                    <td>
                                        <!--<a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a> -->
                                        <a href="<?php echo SITEURL;?>admin/delete-brand.php?id=<?php echo $id;?>" class="btn-danger">Delete Brand</a>
                                    </td>
                                </tr>
                            <?php
                       
                        };

                    }else
                    {
                        //we do not have data in database
                    }
                }
                ?>
            </table>

            <div class="clearfix"></div>
            </div>

        </div>
        <!-- Main Content Section Ends -->
<?php include('patials/footer.php'); ?>