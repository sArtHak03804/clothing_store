<!--===============================================================================================-->	
	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			// var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
			var nameProduct = "Hellooooooooooo";
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		// $('.js-addwish-detail').each(function(){
		// 	var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to wishlist !", "success");

		// 		$(this).addClass('js-addedwish-detail');
		// 		$(this).off('click');
		// 	});
		// });

		/*---------------------------------------------*/

		// $('.js-addcart-detail').each(function(){
		// 	var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to cart !", "success");
		// 	});
		// });
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
    // $(document).ready(function () {
    //     $(".js-show-modal1").click(function (e) {
	// 		alert("hello");
    //         e.preventDefault();

	// 		alert($(this).data("product_id"));
    //         var product_id = $(this).data("product_id");

    //         $.ajax({
    //             url: "main_files/model.php",
    //             type: 'post',
    //             data: { product_id: product_id },
    //             success: function (response) {
    //                 // Append the response to the modal container
    //                 $('.wrap-modal1').html(response);

    //                 // Show the modal (you need to have a modal plugin, like Bootstrap Modal)
    //                 //$('#productModal').modal('show');
    //             },
    //         });
    //     });
    // });
</script>




	