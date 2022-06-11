<?php include('patials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php
            //check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the order details
                $id = $_GET['id'];

                //Get all other details based on this id 
                //SQL Query to get the order details 
                $sql = "SELECT * FROM tb_order WHERE id = $id";

                //Execute the Query 
                $res = mysqli_query($conn,$sql);

                //Count rows 
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Available 
                    $row = mysqli_fetch_assoc($res);

                    $product = $row['product'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                    $item_id = $row['item_id'];
                    $user_id = $row['user_id'];

                }else
                {
                    //details not available 
                    //redirect to manage order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }else
            {
                //Redirect to manage order page
                header('location:'.SITEURL.'admin/manage-order.php');
            }

        ?>
        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Food Name</td>
                <td><b><?php echo $product;?></b></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><b> $ <?php echo $price;?></b></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td>
                    <input type="number" name="qty" value="<?php echo $qty;?>">
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                        <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                        <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Customer Name:</td>
                <td>
                    <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                </td>
            </tr>
            <tr>
                <td>Customer Contact:</td>
                <td>
                    <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                </td>
            </tr>
            <tr>
                <td>Customer Email:</td>
                <td>
                    <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                </td>
            </tr>
            <tr>
                <td>Customer Address:</td>
                <td>
                    <textarea name="customer_address" cols="30" rows="5" ><?php echo $customer_address; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>

        <?php
            //check whether the update button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the value from form
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty ;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                $item_id = $_POST['item_id'];
                $user_id = $_POST['user_id'];

                //update the values
                $sql2 = "UPDATE tb_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id =$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn,$sql2);

                if($res2 ==TRUE){
                  $sql3 = "UPDATE orderinfo SET status = '$status' WHERE item_id =$item_id AND user_id = $user_id";
                  $res3 = mysqli_query($conn,$sql3);
                }

                //Check whether update or not
                //and redirect to manage order with message
                if($res3== true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Order Update successfully!</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }else
                {
                    //Failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to update order</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }

                //and redirect to manage order with message
            }

        ?>
    </div>
</div>



<?php include('patials/footer.php'); ?>