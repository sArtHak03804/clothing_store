<?php 
		include("main_files/session.php");	
		include("main_files/connection.php");

	$product_id=$_GET['product_id'];
    $product_query1=mysqli_query($conn,"SELECT * from product where product_id='$product_id'");
	$product_row1= mysqli_fetch_array($product_query1);

	$category_data = mysqli_query($conn, "SELECT * FROM clothing_category where category_id={$product_row1['category_id']}");
	$row1= mysqli_fetch_array($category_data);

	
	if (isset($_POST['add_cart'])) {
    $product_id = $_GET['product_id'];
    $product_price = $product_row1['product_price'];
    $product_quantity = $_POST['product_quantity'];
    

    $cart_query = mysqli_query($conn, "SELECT * FROM `shopping_cart` WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'");
    if (mysqli_num_rows($cart_query) > 0) {
        $update_query = mysqli_query($conn, "UPDATE `shopping_cart` SET `quantity` = `quantity` + '$product_quantity' WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'");
        if ($update_query) {
            header("Location:shoping-cart.php");
			exit;
        } else {
            echo "Error updating quantity: " ;
        }
    } else {
        $insert_query = mysqli_query($conn, "INSERT INTO `shopping_cart`(`product_id`, `user_id`, `quantity`, `product_price`) VALUES ('$product_id', '$user_id', '$product_quantity', '$product_price')");
        if ($insert_query) {
            header("Location:shoping-cart.php");
			exit;
        } else {
            echo "Error adding product to cart: ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("main_files/main_header.php");?>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
	<?php 
	include("main_files/top_bar.php")
	?>
	</header>
	<!-- Cart -->
	<?php if(isset($user_id) && isset($user_email)): ?>
					<?php 
						include("main_files/cart.php");
					?>
			<?php endif; ?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
				<?php 
					echo $row1['category_title'];
				?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php
				    echo $product_row1['product_title'];
				?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<?php								
								$explode_images=explode(',',$product_row1['product_images']);
								foreach ($explode_images as $image) {
								?>
								
								<div class="item-slick3" data-thumb="<?php echo '../Admin/uploads/'.$image; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo '../Admin/uploads/'.$image; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo '../Admin/uploads/'.$image; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<?php
								}
								?>

							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?php
				echo $product_row1['product_title'];
				?>						</h4>

						<span class="mtext-106 cl2">
						<?php
				echo $product_row1['product_price'];
				?>						</span>

						<p class="stext-102 cl3 p-t-23">
						<?php
				echo $product_row1['product_description'];
				?>						</span>

						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
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
										<select class="js-select2" name="time">
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
<form action="" method="post"  >
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

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
								<?php
				echo $product_row1['product_description'];
				?>								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														Ariana Grande
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span>
												</div>

												<p class="stext-102 cl6">
													Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
												</p>
											</div>
										</div>
										
										<!-- Add review -->
										<form class="w-full">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php
				echo $row1['category_title'];
				?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				<?php 
						$product_data=mysqli_query($conn,"select*from product where category_id=$product_row1[category_id] AND product_id!=$product_id ");
			while ($realated_data=mysqli_fetch_array($product_data)) {
						?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						
						<div class="block2">
							<div class="block2-pic hov-img0">
							<img src="<?php echo '../Admin/uploads/'.$realated_data['product_thumb']; ?>" alt="Product Thumbnail" height="70px" width="80px" style="height: 300px;" >

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-product_id="<?php echo $realated_data['product_id']; ?>">
   								 Quick View
							</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?product_id=<?php echo $realated_data['product_id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							<?php 
							echo $realated_data['product_title'];
							
							?>
							</a>

								<span class="stext-105 cl3">
									<?php 
									echo $realated_data['product_price'];
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
			</div>
		</div>
	</section>
		

	<!-- Footer -->
	<?php 
	include("main_files/footer.php");
	?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>
		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="row">
				<div class="col-md-4 thumb_col" style="position: relative;left: 29px;">
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
											</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 140.8px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-gr-container"><span class="select2-selection__rendered" id="select2-time-gr-container" title="Choose an option">Choose an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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
											</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 140.8px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-56-container"><span class="select2-selection__rendered" id="select2-time-56-container" title="Choose an option">Choose an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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


<?php 
include("main_files/main_scripts.php")
?>
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
                    $('.product_title').text(product_title);
                    $('.product_price').text(product_price);
                    $('.product_description').text(product_description);

                    var j = 0;
                    var k = product_images.length;
                    while (j < k) {
                        data_id = j + 1;
                        imagesHtml = '<img src="../Admin/uploads/' + product_images[j] + '" alt="shoe image">';
                        $('.product_images').append(imagesHtml);
                        thumbnailshtml = '<div class="img-item m-0"><a style="width: 70px; href="#" data-id="' + data_id + '"><img src="../Admin/uploads/' + product_images[j] + '" alt="shoe image"></a></div>';
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
</body>
</html>