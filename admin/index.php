<?php include('patials/menu.php'); ?>
        <!-- Menu Section Ends -->
        <!-- Main Content Section Start -->
        <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br><br>
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }
            ?>
            <br><br>

            <div class="col-4 text-center">
                <?php
                    //SQL Query
                    $sql = "SELECT * FROM category";

                    //Execute Query
                    $res = mysqli_query($conn,$sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count;?></h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
            <?php
                    //SQL Query
                    $sql2 = "SELECT * FROM product";

                    //Execute Query
                    $res2 = mysqli_query($conn,$sql2);

                    //Count Rows
                    $count2 = mysqli_num_rows($res2);


                ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                Product
            </div>

            <div class="col-4 text-center">
            <?php
                    //SQL Query
                    $sql3 = "SELECT * FROM tb_order";

                    //Execute Query
                    $res3 = mysqli_query($conn,$sql3);

                    //Count Rows
                    $count3 = mysqli_num_rows($res3);


                ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                Total Orders
            </div>

            <div class="col-4 text-center">
                <?php
                    //Get SQL Query to get total revenue generated
                    //Arragate function in SQL
                    $sql4 = "SELECT SUM(total) AS Total FROM tb_order WHERE status='Delivered'";

                    //Execute query
                    $res4 = mysqli_query($conn,$sql4);

                    //Get the value
                    $row4 = mysqli_fetch_assoc($res4);

                    //Get the total revenue 
                    $total_revenue = $row4['Total']??0;
                ?>
                <h1><?php echo $total_revenue; ?></h1>
                <br>
                Revenue Generated
            </div>

            <div class="clearfix"></div>
            </div>

        </div>
        <!-- Main Content Section Ends -->
 <?php include('patials/footer.php');?>