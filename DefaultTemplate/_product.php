<?php


$item_id = $_GET['item_id']??1;
foreach($product->getData()as $item):
    if($item['item_id'] == $item_id):
?>

<!--Product-->
<section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="assets/product/<?php echo $item['item_image']??"Unknow" ?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                              <a href="login.php">
                                <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                              </a>
                            </div>
                            <div class="col">
                              <a href="login.php">
                                  <button type="submit" class="btn btn-warning form-control">Add to Cart</button>
                              </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name']??"Unknown"; ?></h5>
                        <small><?php echo $item['item_brand']??"Brand"; ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20.534|1000+ answered questions</a>
                        </div>
                        <hr class="m-0">


                        <!--Product Price-->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>M.R.P:</td>
                                <td><strike>$162.00</strike></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Deal Price:</td>
                                <td class="font-size-20 text-danger">$<span><?php echo $item['post_price']??0; ?></span><small class="text-dark font-size-12">&nbsp&nbspinclusive of all taxes</small></td>
                            </tr>

                            <tr class="font-rale font-size-14">
                                <td>Your Save:</td>
                                <td><span class="font-size-16 text-danger">$10.00</span></td>
                            </tr>
                        </table>
                        <!--Product Price Ends-->
                        <!--Policy-->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">10 Days <br>Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">Daily Tuition<br>Delivered</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">1 Years <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!--Policy Ends-->
                        <hr>

                        <!--Order Details-->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by:Mar 29 - Apr 1</small>
                            <small>Posted by <a href="#"><?php echo $item['auditor'] ?></a>(4.5 out of 5 | 18.189 ratings)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp&nbsp Deliver to Customer - 42420</small>
                        </div>
                        <!--Order Details Ends-->

                        <div class="row">
                            <div class="col-6">
                                <!--Color-->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-baloo">Color:</h6>
                                        <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                    </div>
                                </div>
                                <!--Color Ends-->
                            </div>
                            <div class="col-6">
                                <!-- product qty section-->
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Qty</h6>
                                    <div class="px-4 d-flex font-rale">
                                    </div>
                                    <button class="qty-up border bg-light" data-id="pro1"><i class=" fas fa-angle-up "></i></button>
                                    <input type="text " data-id="pro1" class="qty_input px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                    <button class="qty-down border bg-light" data-id="pro1"><i class=" fas fa-angle-down "></i></button>
                                </div>
                                <!-- Product qty section ends-->
                            </div>
                        </div>

                        <!--size-->
                        <div class="size my-3 ">
                            <h6 class="font-baloo ">Size:</h6>
                            <div class="d-flex justify-content-between w-75 ">
                            <?php foreach ($product_shuffle as $item) { ?>
                                <div class="font-rubik border p-2 "><button class="btn p-0 font-size-14 "onclick="<?php echo $ram_detail = $item['RAM1']; ?>"><?php echo $item['RAM1'];?></button></div>
                                <div class="font-rubik border p-2 "><button class="btn p-0 font-size-14 "onclick="<?php echo $ram_detail = $item['RAM2']; ?>"><?php echo $item['RAM2'];?></button></div>
                                <div class="font-rubik border p-2 "><button class="btn p-0 font-size-14 "onclick="<?php echo $ram_detail = $item['RAM3']; ?>"><?php echo $item['RAM3'];?></button></div>
                                <div class="font-rubik border p-2 "><button class="btn p-0 font-size-14 "onclick="<?php echo $ram_detail = $item['RAM4']; ?>"><?php echo $item['RAM4'];?></button></div>
                            <?php }?>
                            
                        </div>
                        <!--size ends-->
                    </div>

                    <div class="col-12 ">
                        <h6 class="font-rubik ">Product Description</h6>
                        <hr>
                        <p class="font-rale font-size-14 ">
                            <?php echo $item['description'];"" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!--Ends Product-->
<?php
    endif;
    endforeach;
?>
