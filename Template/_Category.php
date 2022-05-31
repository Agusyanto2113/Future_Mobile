<!-- CAtegories Section Starts Here -->
<section class="categories">
  <div class="container-category">
   <h2 class="text-center"></h2>
    <div class="range">
      <?php            
        //Create SQL Query to display categories from data base 
        $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3 ";
            //Execute the query 
            $res = mysqli_query($conn,$sql);
            //Count row to check whether the category is available or not 
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                //Categories is available 
                while($row = mysqli_fetch_assoc($res))
                {
                    //Get the value like id, title ,image_name
                    $id = $row['category_id'];
                    $title = $row['name'];
                    $images = $row['images'];
                    ?>
                        <a href="<?php echo SITEURL; ?>Default-category.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container data-container">
                            <?php
                                //check whether the image is available or not
                                if($images =="")
                                {
                                    //Display message
                                    echo "<div class='error'>Image not Available</div>";
                                }else
                                {
                                    //Image Available
                                    ?>
                                        <img src="<?php echo SITEURL; ?>assets/category/<?php echo $images; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            <h3 class="float-text text-black text-center" ><a href="Login-Product.php"><?php echo $title; ?></a></h3>
                            </div>
                        </a>
                    <?php
                }
            }else
            {
                //Categories is not available
                echo "<div class='error'>Category not Added</div>";
            }
            ?>
            <div class="clearfix"></div>
    </div>
  </div>
</section>
    <!-- Categories Section Ends Here -->