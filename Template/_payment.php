<link rel="stylesheet" href="stylepayment.css">
<div class="container">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  // save for later



  if (isset($_POST['orderinfosubmit'])){
    //$deletedrecord = $Cart->deleteCart($_POST['item_id']);
  }
}
?>


<?php




if(isset($_GET['id']) && isset($_GET['item_id']) && isset($_GET['sub_total']) && isset($_GET['quantityorder'])){

  $id = $_GET['id'];
  $item_id = $_GET['item_id'];
  $subTotal = $_GET['sub_total'];
  $quantitytotal = $_GET['quantityorder'];

  $totalneedpay = $subTotal * $quantitytotal;

  $sqlpro = "SELECT a.item_name,a.item_price,a.item_brand,b.qtyorder,c.full_name,c.gmail,c.CustomerAddress,c.Phone_Num,c.CustomerCity,c.CustomerState,c.Zip_Code,c.full_name_ship,c.Zip_Code_Ship,c.CustomerAddressShipping,c.CustomerStateShipping,c.CustomerCityShipping FROM product a LEFT JOIN cart b ON a.item_id =b.item_id LEFT JOIN tbl_admin C ON b.user_id =c.id WHERE b.user_id = $id";

  $res = mysqli_query($conn, $sqlpro);

  $count = mysqli_num_rows($res);

  if($count==1){
  
  //Get all data
  $row = mysqli_fetch_assoc($res);

  $itemname=$row['item_name'];
  $itemprice = $row['item_price'];
  $qtyorder = $row['qtyorder'];

  $totalpurchase = $qtyorder * $itemprice;


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


    <form action="" method="POST">
      <?php if(isset($_SESSION['Pay']))
            {
                echo $_SESSION['Pay'];
                unset ($_SESSION['Pay']);
            }
      ?>
        <div class="row">
            <div class="col">
                <h3 class="title">billing address</h3>
                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" name="billingname" placeholder="Input Your Full Name" Value="<?php echo $fullname ??""; ?>">
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="billingemail" placeholder="example@example.com" value="<?php echo $gmail ??"";?>">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="billingaddress" placeholder="room - street - locality" value="<?php echo $customeraddresss ??""; ?>">
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="billingcity" REQIURED placeholder="Input Your City Name" value="<?php echo $customercity ??""; ?>">
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text" name="billingstate" placeholder="Input Your Country Name" value="<?php echo $customerstate ??""; ?>">
                    </div>
                    <div class="inputBox">
                        <span>Zip Code :</span>
                        <input type="text" name="zipcode" placeholder="123 456" value="<?php echo $customerzipcode ??""; ?>">
                    </div>
                </div>
            </div>

            
            <div class="col">
            <label for="myCheck">Manual Payment:</label> 
            <input type="checkbox" id="myCheck" onclick="myFunction()">

            <label for="myCheck">Select Payment:</label> 
            <input type="checkbox" id="myCheck1" onclick="myFunction()">

          
            

            </br>
            <div id="text" class="col">
                <h3 class="title">Payment</h3>

                <div class="inputBox">
                    <span>Cards Accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Name On Card :</span>
                    <input type="text" name="cardname" placeholder="Input Your Name">
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="number" name="cardnumber" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>Exp Month :</span>
                    <input type="text" name="cardexp" placeholder="Input Your Exp Month">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Exp Year :</span>
                        <input type="number" name="cardyear" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="password" name="cardcvv"placeholder="1234">
                    </div>
                </div>
                <div class="inputBox">
                    <span>Total Pay :</span>
                    <input type="number" name="subtotal" value="<?php echo $totalneedpay; ?>">
                </div>
            </div>
            </div>
            <!--<h3 id="text" style="display:none" class="title">Payment</h3>

            <p id="text" style="display:none">Checkbox is CHECKED!</p>-->
         
            <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRUtelT44="
            croessorigin="anonymous"
            ></script>
            <script>
            function myFunction() {
              var checkBox = document.getElementById("myCheck");
              var text = document.getElementById("text");
              if (checkBox.checked == true){
                text.style.display = "block";
              } else {
                text.style.display = "none";
              }
            }

            $(document).ready(function(){
              $("#pay-detail").change(function(){
                console.log("Hi....");
              })
            }
            )
            </script>
    
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
        <input type="hidden" name="item_name" value="<?php echo $itemname; ?>">
        <input type="hidden" name="item_price" value="<?php echo $itemprice; ?>">
        <input type="hidden" name="qtyorder" value="<?php echo $qtyorder; ?>">
        <input type="hidden" name="totalpurchase" value="<?php echo $totalneedpay; ?>">
        <input type="hidden"  name="date" value= "<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s"); ?>">
        <input type="hidden" name="fullnameship" value="<?php echo $fullnameship; ?>">
        <input type="hidden" name="addressship" value="<?php echo $customeraddressshipping; ?>">
        <input type="hidden" name="contact" value="<?php echo $phonenum; ?>">
        <input type="submit" name="orderinfosubmit" value="Payment" class="submit-btn">

    </form>


    <?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      if (isset($_POST['orderinfosubmit'])){
          
          $id = $_POST['id'];
          $itemname = $_POST['item_name'];
          $itemprice= $_POST['item_price'];
          $qtyorder= $_POST['qtyorder'];
          $totalpurchase = $_POST['totalpurchase'];
          $date = $_POST['date'];
          $fullnameship = $_POST['fullnameship'];
          $phonenum = $_POST['contact'];
          $shippingaddress = $_POST['addressship'];
          $zipcode = $_POST['zipcode'];

          $cardname= $_POST['cardname'];
          $cardnumber = $_POST['cardnumber'];
          $item_id = $_POST['item_id'];
          $subtotal = $_POST['subtotal'];
          $billname =$_POST['billingname'];
          $billemail = $_POST['billingemail'];
          $billaddress = $_POST['billingaddress'];
          $billingcity = $_POST['billingcity'];
          $billingstate = $_POST['billingstate'];
          $cardnumber = $_POST['cardnumber'];
          $expmonth = $_POST['cardexp'];
          $cardyear = $_POST['cardyear'];
          $cardcvv = $_POST['cardcvv'];


          if($billname!="" && $billaddress !="" ){ 
          $sqlexe = "INSERT INTO tb_order SET
          product = '$itemname',
          price = '$itemprice',
          qty ='$qtyorder',
          total = '$totalpurchase',
          orderdate = '$date',
          customer_name = '$fullnameship',
          customer_contact = '$phonenum',
          customer_email = '$billemail',
          customer_address = '$shippingaddress',
          user_id = '$id',
          item_id = '$item_id',
          zip_code = '$zipcode',
          cardname = '$cardname',
          card_number = '$cardnumber',
          expmonth = '$expmonth',
          expyear = '$cardyear',
          cvv = '$cardcvv'
          ";
          
          echo $itemname;
          echo $itemprice;
          echo $qtyorder;
          echo $totalpurchase;
          echo $date;
          echo $fullnameship;
          echo $phonenum;
          echo $billemail;
          echo $shippingaddress;
          echo $id;
          echo $item_id;
          echo $zipcode;
          echo $cardname;
          echo $cardnumber;
          echo $expmonth;
          echo $cardyear;
          echo $cardcvv;


          $resexe = mysqli_query($conn, $sqlexe);

          $sqlinfo = "INSERT INTO orderinfo SET
          user_id = '$id',
          item_id = '$item_id',
          qtyorder = '$qtyorder',
          price = '$itemprice',
          product_name = '$itemname'
          ";

          $resexe1 =mysqli_query($conn, $sqlinfo);

          }else{
             //Failed to add Category 
             $_SESSION['Pay'] = "<div class='error text-center'>Failed to Make Payment Please Check Your Data .</div>";
             //Redirect to manage category page
             header('location:'.SITEURL.'checkout.php');
          }

          if($resexe == true)
            {
              
                // Query Executed and Category Added
                $_SESSION['Pay'] = "<div class='success text-center' >PayMent Successfully.</div>";
                //Redirect to manage category page
                $deletedrecord = $Cart->deleteCart($_POST['item_id']);
                header('location:'.SITEURL.'cart.php');
                
            }else
            {
                //Failed to add Category 
                $_SESSION['Pay'] = "<div class='error text-center'>Failed to Make Payment Please Check Your Data .</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'cart.php');
            }

      }
    }
    ?>

</div> 