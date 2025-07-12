<?php 
        include("main_files/connection.php");
        include("main_files/top_bar.php");
        include("main_files/main_header.php");
	?>
  <!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="animsition">
<!-- Cart -->
			<?php if(isset($user_id) && isset($user_email)): ?>
					<?php 
						include("main_files/cart.php");
					?>
			<?php endif; ?>
	<!-- Slider -->
	<section class="section-slide">
      <div class="wrap-slick1">
        <div class="slick1">
          <div
            class="item-slick1"
            style="background-image: url(images/slide-one.jpg)"
          >
            <div class="container h-full">
              <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                <div
                  class="layer-slick1 animated visible-false"
                  data-appear="fadeInDown"
                  data-delay="0"
                >
                  <span class="ltext-101 cl2 respon2">
                    FitTry! Pefect Fit Everytime.
                  </span>
                </div>

                <div
                  class="layer-slick1 animated visible-false"
                  data-appear="fadeInUp"
                  data-delay="800"
                >
                  <h2
                    style="text-transform: capitalize"
                    class="ltext-201 cl2 p-t-19 p-b-43 respon1"
                  >New Shoe Collection</h2>
                </div>

                <div
                  class="layer-slick1 animated visible-false"
                  data-appear="zoomIn"
                  data-delay="1600"
                >
                  <a
                    href="product.php"
                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                  >
                    Shop Now
                  </a>
                </div>
              </div>
            </div>
          </div>
          
          <div
            class="item-slick1"
            style="background-image: url(images/FitTry.png)"
          >
            <div class="container h-full">
              <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                <div
                  class="layer-slick1 animated visible-false"
                  data-appear="fadeInDown"
                  data-delay="0"
                >
                  <span class="ltext-101 cl2 respon2">
                    FitTry 
                    <br>
                    have Perfect Fitting Shoes,
                    <br>
                    For You
                  </span>
                </div>

                <div
                  class="layer-slick1 animated visible-false"
                  data-appear="fadeInUp"
                  data-delay="800"
                >
                  <h2
                    style="text-transform: capitalize"
                    class="ltext-201 cl2 p-t-19 p-b-43 respon1"
                  ></h2>
                </div>

                <div
                  class="layer-slick1 animated visible-false"
                  data-appear="zoomIn"
                  data-delay="1600"
                >
                  <a
                    href="product.php"
                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                  >
                    Shop Now
                  </a>
                </div>
              </div>
            </div>
          </div>
          

          
        </div>
      </div>
    </section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<?php 
			$query = mysqli_query($conn, "SELECT * FROM clothing_category ORDER BY category_id DESC LIMIT 3");

					while($row= mysqli_fetch_array($query))
					{
					?>
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 customeLux wrap-pic-w" style="height: fit-content;" >
					<img src="<?php echo '../Admin/category/'.$row['category_thumb']; ?>" alt="category Thumbnail" height="250px" width="80px" >
						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
					<?php 
					echo $row['category_title'];
					?>
								</span>

							<span class="block1-info stext-102 trans-04">
							<?php 
							echo $row['category_description'];
							?>									
							</span>

							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php 
				}?>

				
			</div>
		</div>
	</div>

  <!-- Product -->
<?php 
include("main_files/product_content.php");
?>

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

<?php 
include("main_files/main_scripts.php");
?>

</body>
</html>