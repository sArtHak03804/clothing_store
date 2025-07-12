<?php 
if (isset($_POST['add_cart'])) {
    $product_id = $_POST['product_id'];
    $product_price = $product_row['product_price'];
    $product_quantity = $_POST['product_quantity'];
    

    $cart_query = mysqli_query($conn, "SELECT * FROM `shopping_cart` WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'");
    if (mysqli_num_rows($cart_query) > 0) {
        $update_query = mysqli_query($conn, "UPDATE `shopping_cart` SET `quantity` = `quantity` + '$product_quantity' WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'");
        if ($update_query) {
            ?>
			<script>
				window.location.href = "index.php";
			</script>
			<?php
        } else {
            echo "Error updating quantity: " ;
        }
    } else {
        $insert_query = mysqli_query($conn, "INSERT INTO `shopping_cart`(`product_id`, `user_id`, `quantity`, `product_price`) VALUES ('$product_id', '$user_id', '$product_quantity', '$product_price')");
        if ($insert_query) {
            //header("Location:index.php");
			?>
			<script>
				window.location.href = "index.php";
			</script>
			<?php
        } else {
            echo "Error adding product to cart: ";
        }
    }
}
?>

<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					<?php 
			$query = mysqli_query($conn, "SELECT * FROM clothing_category ");

					while($row= mysqli_fetch_array($query))
					{
					?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="<?php echo '.'.$row['category_title'];?>">
					<?php 
					echo $row['category_title'];
					?>
					</button>
					<?php 
					}?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<!-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div> -->

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<!-- <div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div> -->
						<div id="productModalContainer"></div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php 
$product_data=mysqli_query($conn,"SELECT * FROM product ");

?>
			<div class="row isotope-grid">
			<?php 
			while ($product_row=mysqli_fetch_array($product_data)) {
				$category_query = mysqli_query($conn, "SELECT * FROM clothing_category where category_id=$product_row[category_id]");
				$category_row=mysqli_fetch_array($category_query);
			?>	
			
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $category_row['category_title']; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
						<img src="<?php echo '../Admin/uploads/'.$product_row['product_thumb']; ?>" alt="Product Thumbnail" height="70px" width="80px" style="height: 300px;" >
		<!-- Assuming this is your button triggering the AJAX request -->
		<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-product_id="<?php echo $product_row['product_id']; ?>">
    Quick View
</a>
</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?product_id=<?php echo $product_row['product_id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							<?php 
							echo $product_row['product_title'];
							
							?>
							</a>
								<span class="stext-105 cl3">
									<?php 
									echo $product_row['product_price'];
										?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
<?php 

}?>

			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>





<!-- Modal1 -->

<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>
		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="row">
				<div class="col-md-4 thumb_col " style="position: relative;left: 29px;">
				<div class="img-select product_thumbnails">
        <!-- <div class="img-item">
          <a href="#" data-id="1">
            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt="shoe image">
          </a>
        </div>
        <div class="img-item">
          <a href="#" data-id="2">
            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt="shoe image">
          </a>
        </div>
        <div class="img-item">
          <a href="#" data-id="3">
            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt="shoe image">
          </a>
        </div>
        <div class="img-item">
          <a href="#" data-id="4">
            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt="shoe image">
          </a>
        </div> -->
      </div>
				</div>
				<div class="col-md-4" style="position: relative;left: 250px;">
							<div class="product-imgs">
								<div class="img-display">
									<div class="img-showcase product_images" style="transform: translateX(0px);"><img src="../Admin/uploads/product-11-detail-img1.png" alt="shoe image"><img src="../Admin/uploads/product-11-detail-img2.png" alt="shoe image"><img src="../Admin/uploads/product-11-detail-img3.png" alt="shoe image"><img src="../Admin/uploads/size-chart.jpg" alt="shoe image"></div>
							</div>
				
						</div>
					</div>
					<div class="col-md-4" style="position: relative;left: 250px;">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14 product_title">Nike Air Max SC</h4>

							<span class="mtext-106 cl2 product_price">7095.0</span>

							<p class="stext-102 cl3 p-t-23 product_description"></p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
												<option>Choose an option</option>
												<option>Size 13</option>
												<option>Size 12</option>
												<option>Size 11</option>
												<option>Size 10</option>
												<option>Size 9</option>
												<option>Size 8</option>
												<option>Size 7</option>
												<option>Size 6</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<form action="" method="post">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="product_quantity" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										<input type="hidden" name="product_title" class="product_title" />

										<input type="hidden" name="product_id" class="product_id" />

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" name="add_cart" >
											Add to cart
										</button>
									</div>
								</div>
								</form>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




<!-- product_content.php -->
<!-- Your existing HTML content -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>$(document).ready(function () {
   
    function initImageSlider() {
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    }

    $(".js-show-modal1").click(function (e) {
        e.preventDefault();
        $('.product_images').html('');
        $('.product_thumbnails').html('');
        var product_id = $(this).data("product_id");

        $.ajax({
            url: "main_files/model.php",
            type: 'post',
            dataType: 'JSON',
            data: { product_id: product_id },
            success: function (response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var product_title = response[i].product_title;
                    var product_price = response[i].product_price;
                    var product_description = response[i].product_description;
                    var product_images = response[i].product_images;
                    $('.product_title').val(product_title);
                    $('.product_price').text(product_price);
                    $('.product_description').text(product_description);
					$('.product_id').val(product_id);
                    var j = 0;
                    var k = product_images.length;
                    while (j < k) {
                        data_id = j + 1;
                        imagesHtml = '<img src="../Admin/uploads/' + product_images[j] + '" alt="shoe image">';
                        $('.product_images').append(imagesHtml);
                        thumbnailshtml = '<div class="img-item m-0 "><a style="width: 70px; href="#" data-id="' + data_id + '"><img src="../Admin/uploads/' + product_images[j] + '" alt="shoe image"></a></div>';
                        $('.product_thumbnails').append(thumbnailshtml);
                        j++;
                    }
                    initImageSlider(); 
                }
            },
        });
    } );
});
</script>

