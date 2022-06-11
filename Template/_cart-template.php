<!-- Shopping cart section  -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCartItem($_POST['item_id']);
        }

        // save for later
        if (isset($_POST['wishlist-submit'])){
            $Cart->saveForLater($_POST['item_id']);
        }

        if (isset($_POST['smbtbtn'])){
          $Cart->updateQty($_POST['qtydata'],$_POST['item_id'],$_POST['user_id'],$_POST['item_price']);
          if($Cart == TRUE){
            header("location:".SITEURL.'checkout.php');
          }
      }
    }
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($Cart->getData('cart') as $item) :
                        $cart = $Cart->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="assets/product/<?php echo $item['item_image'];?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['product_name'] ?? "Unknown"; ?></h5>
                        <!--<small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>-->
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            
                            <div class="d-flex font-rale w-25">
                            
                                <button type="submit" name="submitqty" class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                    
                                    <input  type="text" name="qtydata" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-3 w-100 bg-light" readonly value="<?php echo $item['qtyorder']?>" placeholder="1" class="transparant">
                                    
                                    
                                <button type="submit" name="submitqty" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            
                            </div>
                            
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                            </form>

                            <div>
                              
                            </div>

                            <!--<script type="text/javascript">
                              var x = document.getElementById("text1").value;
                                var defaultVal = x.defaultValue;
                              function fn1() {
                              //  var str = document.getElementById("text1").value;
                              //  document.writeIn(str);
                                var x = document.getElementById("text1");
                                var defaultVal = x.defaultValue;
                                var currentVal = x.value;

                                if(defaultVal==currentVal){
                                  document.getElementById("demo").innerHTML = x.defaultValue;
                                }else{
                                  document.getElementById("demo").innerHTML = currentVal;
                                }

                              }
                            </script>
                            -->

                            
                          
                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['price'] ?? 1; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price" name="totprice"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        
                        <form method="POST">
                        <!--<p name="demo" id="demo"></p>-->
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                        <input type="hidden" name="user_id" value="<?php echo $iduser; ?>">
                        <input type="hidden" name="item_price" value="<?php echo $item['price']; ?>">
                        <input id="text1" type="hidden" name="qtydata" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-3 w-100 bg-light" value="1" readonly  placeholder="1" class="transparant">
                        
                        <button type="submit" name="smbtbtn"  class="btn btn-warning mt-3">Proceed to Buy</button>
                        <a href='<?php echo SITEURL; ?>checkout.php?id=<?php echo $iduser;?>&item_id=<?php echo $item['item_id'];?>&sub_total=<?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?>&quantityorder=<?php echo isset($subTotal) ? count($subTotal) : 0; ?>'>
                        </a>
                        <?php
                        //if(isset($_POST['submit'])){
                        //  $qty=$_POST['demo'];
                        //  echo $qty;
                        //}
                        //echo $is;
                        ?>
                        </form>

                       
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->
