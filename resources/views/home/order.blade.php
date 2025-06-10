<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! JsonLd::generate() !!}

    <!-- Favicon -->
   <!--===============================================================================================-->	
   <link rel="icon" style="width: 100%" type="image/png" href="{{ asset('images/icons/ernovv.svg') }}"/>
   <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class="animsition">
	<!-- Navbar -->
	@include('partials.navbartwo')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('bag.png') }}');">
		<h2 class="ltext-105 cl0 txt-center" style="color: #404040;">
			How to Order
		</h2>
	</section>	
	

	<!-- breadcrumb -->


	<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
	<div class="container">

		<!-- Bagian 1 -->
		<div class="row p-b-148 justify-content-center">
			<div class="col-md-10 col-lg-8 text-start">
				<h3 class="mtext-111 cl2 p-b-16">
					CREATE YOUR OWN DESIGN
				</h3>
				<p class="stext-113 cl6 p-b-26">
					The design of your product is as important to us as it is to you. While looking at the design ERNOV determines different possible ways the bag could be constructed, how a pattern can be created and discusses this and other options he has found, with you. They are worked through together until a completed design is put together. Leathers, colour, lining and hardware are also chosen and once all aspects of you design are selected, they are presented to the pattern maker.
				</p>
			</div>
		</div>

		<!-- Bagian 2 -->
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8 text-start">
				<h3 class="mtext-111 cl2 p-b-16">
					PICK FROM ERNOV DESIGN
				</h3>
				<p class="stext-113 cl6 p-b-26">
					ERNOV have lots of design of bags that you can choose from our catalogs, or you can get inspiration from it and create your own new design. Let’s explore your imagination and bring the freedom into the design process.
				</p>
			</div>
		</div>

		<!-- Bagian 3 -->
		<div class="row p-t-75 justify-content-center">
			<div class="col-md-10 col-lg-8 text-start">
				<h3 class="mtext-111 cl2 p-b-16">
					CHOOSE COLOUR & PATTERN
				</h3>
				<p class="stext-113 cl6 p-b-26">
					So many colours and patterns to explore. Mix and match your favourite colours with your design. Please check our colours catalog (click here) and let us know what you think.
				</p>
			</div>
		</div>

		<!-- Bagian 4 -->
		<div class="row p-t-75 justify-content-center">
			<div class="col-md-10 col-lg-8 text-start">
				<h3 class="mtext-111 cl2 p-b-16">
					PROCESSING
				</h3>
				<p class="stext-113 cl6 p-b-26">
					Every bag is unique and has different difficulty levels. We create the bag with care and detail. The processing time is relatively unpredictable depending on the quantity and availability of the support items. Once you put the order, we can discuss the processing time.
				</p>
			</div>
		</div>

	</div>
</section>



	<!-- Footer -->
    @include('partials.footer')



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
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
	<script src="js/main.js"></script>
	{{-- <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script> --}}

</body>
</html>