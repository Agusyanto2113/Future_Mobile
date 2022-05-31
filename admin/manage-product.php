<?php include('patials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>
        <br>
            <br>
            <br>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset ($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
            ?>
            <br>
            <!-- Button Add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add Product</a>
            <a href="<?php echo SITEURL; ?>admin/print.php" class="btn-secondary">Print Product</a>
            </br>
            </br>
            </br>   
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Date</th>
                    <th>Auditor</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    //Create a SQL Query to get all the food
                    $sql = "SELECT * FROM product";
                    //Execute the Query 
                    $res = mysqli_query($conn, $sql);
                    //Count Rows to check whether we have foods or not 
                    $count = mysqli_num_rows($res);
                    //Create serial number variable and set default value as 1 
                    $sn = 1;

                    if($count >0)
                    {
                        //We have have foo in database
                        //Get the foods from database and display 
                        while($row = mysqli_fetch_assoc($res))
                        {
                            //get all the values from individual columns 
                            $id = $row['item_id'];
                            $brand = $row['item_brand'];
                            $name = $row['item_name'];
                            $price = $row['item_price'];
                            $images = $row['item_image'];
                            $date = $row['item_register'];
                            $auditor = $row['auditor'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td>
                                    <?php 
                                        //check whether image_name is available or not
                                        if($images!="")
                                        {
                                            //display the image
                                            ?>
                                            <img src="<?php echo SITEURL; ?>./assets/product/<?php echo $images; ?>" width="100px" class="img-admin">
                                            <?php
                                        }else
                                        {
                                            //display the message
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $auditor; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Product</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-description.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Description</a>  
                                        <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&item_image=<?php echo $images;?>" class="btn-danger">Delete Product</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else
                    {
                        //Food Not added in database 
                        echo "<tr><td colspan='7' class='error'>Product not Added Yet </td></tr>";
                    }
                ?>

                
            </table>
    </div>
</div>
<?php include('patials/footer.php');?>