<?php 
	include("main_files/session.php");

	?>



<html>
	<head>
		<title>clothing_store</title>
	</head>
<body>
<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

				<div class="right-top-bar flex-w h-full ">
						

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Calculator
						</a>
						

               
                    <?php if(isset($user_id) && isset($user_email))
					{ ?>
                        <!-- If session is set, display the logout link -->
						<a href="logout.php" class="flex-c-m trans-04 p-lr-25">
						<i class="fa fa-lock"></i>&nbsp;Log Out
					</a>
                    <?php 
						}
						else{
							?>
							<a href="./user_login.php" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-sign-in"></i>&nbsp;Sign in
					</a>
					<?php
						}
						?>
                </div>
            </div>
        </div>
        

        <div class="wrap-menu-desktop <?php if(basename($_SERVER['PHP_SELF'])!='index.php'){ echo 'how-shadow1'; }?>">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->        
                <a href="index.php" class="logo">
                    <img src="images/icons/finalLogo.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="index.php">Home</a>
                        </li>


                        <li>
                            <a href="product.php">Shop</a>
                        </li>

												<li>
                            <a href="contact.php">Contact us</a>
                        </li>
												

												
                    </ul>
                </div>  

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">


				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <?php if(isset($user_id) && isset($user_email)): 
						$conn=mysqli_connect("localhost","root","","clothing_db");
						$cart_count_query = mysqli_query($conn, "SELECT COUNT(*) AS cart_count FROM `shopping_cart` WHERE `user_id` = '$user_id'");
						$cart_count_row = mysqli_fetch_assoc($cart_count_query);
						$cart_count = $cart_count_row['cart_count'];?>
                        <!-- If session is set, display the cart icon -->
                        <!-- Cart Icon -->
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $cart_count; ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

                    <?php endif; ?>

                   

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>  
    </div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/finalLogo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.php">Shop</a>
				</li>

				
				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
</body>
</html>