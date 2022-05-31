<?php include('patials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
            <br>
            <br>

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset ($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset ($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset ($_SESSION['failed-remove']);
            }
            ?>
            <br>
            <br>
            <!-- Button Add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
            </br>
            </br>
            </br>   
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Images</th>
                    <th>Auditor</th>
                    <th>Date</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                    //Query to get all categories from database
                    $sql = "SELECT * FROM category";

                    //Eecute Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Create Serial number variable and assign value as 1
                    $sn=1;

                    // Check whether we have the data in database or not
                    if($count >0)
                    {
                        //we have data in database 
                        //get the data and display 
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['category_id'];
                            $title = $row['name'];
                            $brand = $row['brand'];
                            $images = $row['images'];
                            $auditor = $row['auditor'];
                            $date = $row['date'];
                            $active = $row['active'];
                            $featured = $row['featured'];


                            ?>
                            <tr>
                                <td><?php echo $sn++;?>.</td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $brand; ?></td>
                                <td>
                                    <?php 
                                        //check whether image_name is available or not
                                        if($images!="")
                                        {
                                            //display the image
                                            ?>
                                            <img src="<?php echo SITEURL; ?>./assets/category/<?php echo $images; ?>" width="100px" class="img-admin">
                                            <?php
                                        }else
                                        {
                                            //display the message
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $auditor; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active;?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&images=<?php echo $images; ?>" class="btn-danger">Delete Category</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else
                    {
                        //we do not have a data
                        //we will display the message inside table 
                        ?>
                        <tr>
                            <td colspan="6"><div class="error">No Category Added</div></td>
                        </tr>
                        <?php
                    }
                ?>    
            </table>
    </div>
</div>
<?php include('patials/footer.php');?>