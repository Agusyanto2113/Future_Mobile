<!-- Shopping cart section  -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

<?php
$sql = "SELECT a.user_id , a.item_id FROM orderinfo a LEFT JOIN tb_order b ON a.item_id =b.item_id AND a.user_id = b.user_id WHERE user_id = $iduser";



?>
        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getData('orderinfo') as $item) :
                        $cart = $product->getProduct($item['item_id']);


                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="assets/product/<?php echo $item['item_image']??"Unknow";?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
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

                                    <span name="quantity_order" data-id="<?php echo $item['item_id'] ?? '0'; ?>" type="text " data-id="pro1" class="num px-2 w-50 bg-light text-center" readonly placeholder="1">1</span>
                                    <script>
                                    const plus =document.querySelector(".plus"),
                                    minus =document.querySelector(".minus"),
                                    num =document.querySelector(".num");

                                    let a = 1;
                                    plus.addEventListener("click",()=>{
                                    a++;
                                    a = (a< 10)?a :a;
                                    num.innerText = a;
                                    console.log("a");
                                    });

                                    minus.addEventListener("click",()=>{
                                    if(a > 1 ){
                                      a--;
                                      a = (a< 10)?+ a :a;
                                      num.innerText = a;
                                    }
                                    });
                                    </script>
                              
                            </div>

                       </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>

    
</section>
<!-- !Shopping cart section  -->