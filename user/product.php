<?php 
	include("main_files/session.php");
	include("main_files/connection.php");

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	include("main_files/main_header.php");
	?>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
	<?php 
	include("main_files/top_bar.php");
	?>
	</header>


	<!-- Cart -->
	<?php 
include("main_files/cart.php");
?>

	
	<!-- Product -->

	<?php 
include("main_files/product_content.php");
?>
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<!-- Footer -->
	<?php 
include("main_files/footer.php");
?>


	

	<!-- Modal1 -->
	



<?php 
include("main_files/main_scripts.php");
?>
<!-- product_content.php -->

</body>
</html>