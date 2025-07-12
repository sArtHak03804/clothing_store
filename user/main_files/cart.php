	    <!-- Your HTML code -->
 
	
		<div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <!-- Cart items here -->
                    <?php 
                        $cart_query = mysqli_query($conn, "SELECT * FROM `shopping_cart` WHERE `user_id` = '$user_id'");
						
						while ($cart_data = mysqli_fetch_array($cart_query)) { 
                            $product_query = mysqli_query($conn, "SELECT * FROM `product` WHERE `product_id` = '$cart_data[product_id]'");
                            $product_row = mysqli_fetch_array($product_query);
                    ?>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
						<img src="<?php echo '../Admin/uploads/'.$product_row['product_thumb']; ?>" alt="Product Thumbnail"  >
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                        <a href="product-detail.php?product_id=<?php echo $product_row['product_id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php echo $product_row['product_title']; ?>
                            </a>
 <input type="hidden" name="" id="" value="<?php echo $product_row['product_id']?>" >
                            <span class="header-cart-item-info">
                                <?php echo $cart_data['quantity'] . " x $" . $product_row['product_price']; ?>
                            </span>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                
                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="placeorder.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


   