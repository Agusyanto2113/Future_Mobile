<div>
    <h2>Food Menu</h3>
    <div class="logo">
        <a href="#" title="Logo">
            <img src="../images/logo.png" alt="Restaurant Logo" class="img-responsive">
        </a>
    </div>
</div>

<hr>
<?php include('../config/constants.php'); ?>

<div>
    <table class="table mt-3" style="width:70%">
        <tr>
            <th width="1%">No</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Details</th>
        </tr>
        <?php
            $sn=1;
            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($res))
            {   
                $image_name = $row['image_name'];
                ?>
                <tr>
                    <td><?php echo $sn++;?></td>
                    <td><?php echo $row['title'];?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><?php 
                            //Check whether we have image or not 
                            if($image_name == "")
                            {
                            //we do not have image, display error message
                            echo "<div class='error'>Image not Added. </div>";


                            }else
                            {
                            //we have image , display image
                            ?>
                                <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" width="100px">
                            <?php
                            }     
                        ?>
                    </td>
                    <td><?php echo $row['description']; ?></td>
                </tr>
                <?php
            }
        ?>
    
    </table>
    <script>window.print()</script>
</div>