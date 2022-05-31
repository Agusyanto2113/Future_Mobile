<link rel="stylesheet" href="stylepayment.css">

<?php 

if(isset($_GET['id'])){

  $id = $_GET['id'];

  $sqlpro = "SELECT * FROM tbl_admin WHERE id=$id";

  $res = mysqli_query($conn, $sqlpro);

  $count = mysqli_num_rows($res);

  if($count==1){
  
  //Get all data
  $row = mysqli_fetch_assoc($res);

  $fullname = $row['full_name'];
  $gmail = $row['gmail'];
  $customeraddresss = $row['CustomerAddress'];
  $customercity = $row['CustomerCity'];
  $customerstate = $row['CustomerState'];
  $customerzipcode = $row['Zip_Code'];

  $fullnameship = $row['full_name_ship'];
  $phonenum = $row['Phone_Num'];
  $zipcodeship = $row['Zip_Code_Ship'];
  $customeraddressshipping = $row['CustomerAddressShipping'];
  $customercityshipping = $row['CustomerCityShipping'];
  $customerstateshipping = $row['CustomerStateShipping'];

  }
}
?>


<div class="container">
    <a href="orderinfo.php" class="text-dark colorD">View Order</a>
<br><br>
    <form action="" METHOD="POST">
        <div class="row">
            <div class="col">
            <?php
            //if(isset($_SESSION['update']))
           // {
           //     echo $_SESSION['update'];
           //     unset ($_SESSION['update']);
           // }
            ?>
                <h3 class="title">Profile Data</h3>
                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" name="full-name" placeholder="Your Full Name" value="<?php echo $fullname ??""; ?>">
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="email" placeholder="example@example.com" value="<?php echo $gmail ??""; ?>">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="address-data" placeholder="room - street - locality" value="<?php echo $customeraddresss ??"";?>">
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="city-data" placeholder="Your Ciy Name" value="<?php echo $customercity ??"";?>">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text" name="state-data" placeholder="Your Country Name" value="<?php echo $customerstate ??""; ?>">
                    </div>
                    <div class="inputBox">
                        <span>Zip Code :</span>
                        <input type="text" name="zip-data" placeholder="123 456" value="<?php echo $customerzipcode ??"";?>">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Shipping Address</h3>

                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" name="name-ship-data" placeholder="Your Name" value="<?php echo $fullnameship ??"";?>">
                </div>
                <div class="inputBox">
                    <span>Phone :</span>
                    <input type="number" name="phone-data" placeholder="example-08234536475854" value="<?php echo $phonenum ??"";  ?>">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text"  name="address-shipping"placeholder="room - street - locality" value="<?php echo $customeraddressshipping ??""; ?>">
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="shipping-city" placeholder="Your City Name" value="<?php echo $customercityshipping ??""; ?>">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text" name="shipping-state" placeholder="Your Country Name" value="<?php echo $customerstateshipping ??""; ?>">
                    </div>
                    <div class="inputBox">
                        <span>Zip Code :</span>
                        <input type="text" name="zip-code-shipping"placeholder="123 456" value="<?php echo $zipcodeship ??""; ?>">
                    </div>
                </div>

            </div>
    
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Update Data" class="submit-btn">

        
    </form>
    <?php
        //check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
          $id = $_POST['id'];
          $fullname = $_POST['full-name'];
          $email = $_POST['email'];
          $addressdata =$_POST['address-data'];
          $citydata = $_POST['city-data'];
          $statedata = $_POST['state-data'];
          $zipdata = $_POST['zip-data'];

          $fullnameship = $_POST['name-ship-data'];
          $phone = $_POST['phone-data'];
          $addressshipping = $_POST['address-shipping'];
          $shippingcity = $_POST['shipping-city'];
          $shippingstate = $_POST['shipping-state'];
          $shippingzipcode = $_POST['zip-code-shipping'];

          $sql2 = "UPDATE tbl_admin SET
          full_name = '$fullname',
          gmail = '$email',
          CustomerAddress = '$addressdata',
          CustomerCity = '$citydata',
          CustomerState ='$statedata',
          Zip_Code = '$zipdata',
          full_name_ship = '$fullnameship',
          Phone_Num = '$phone',
          Zip_Code_Ship = '$shippingzipcode',
          CustomerAddressShipping = '$addressshipping',
          CustomerCityShipping = '$shippingcity',
          CustomerStateShipping = '$shippingstate'
          WHERE id = $id
          ";

          $res2 = mysqli_query($conn,$sql2);


          echo $sql2;

          if($res2 == true)
          {
             //Category Update 
              $_SESSION['update'] = "<div class='success'>Data Updated Successfully!.</div>";
              header('location:'.SITEURL.'profile.php');
          }else
          {
               //Failed to Update category
             $_SESSION['update'] = "<div class='error'>Failed to update Data!.</div>";
             header('location:'.SITEURL.'profile.php');
          }
        }
        ?>
</div>   