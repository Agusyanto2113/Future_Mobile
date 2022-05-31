<!-- Top Sale -->
<?php

    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme" onclick="location.href='login.php'">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'Defaultproduct.php',  $item['item_id']); ?>"><img src="assets/product/<?php echo $item['item_image'];?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center" onclick="location.href='login.php'">
                        <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price'] ?? '0' ; ?></span>
                        </div>
                        <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12"><a class="colorD text-white" href="login.php"btn-warning font-size-12>Add to Cart</a></button>                      
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->