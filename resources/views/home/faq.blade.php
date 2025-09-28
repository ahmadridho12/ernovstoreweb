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
    <link rel="icon" style="width: 100%" type="image/png" href="{{ asset('images/icons/logoernovnewwhite.svg') }}" />
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
    @include('partials.navbarsim')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('bag.png') }}');">
        <h2 class="ltext-105 cl0 txt-center" style="color: #404040;">
            Frequently answer & question (FAQ)
        </h2>
    </section>


    <!-- breadcrumb -->


    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">

            <!-- Can you ship to other countries? -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">Can you ship to other countries?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        Yes, we can ship to other countries. ERNOV has two well-known global couriers, DHL and FedEx.
                        You can choose which one you desired or we happily accept if you have your own courier company.
                    </p>
                </div>
            </div>

            <!-- Do I need a specific document to export python skin? -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">Do I need a specific document to export python skin?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        Yes, you do and it is called CITES.
                        <a href="{{ route('home.shippinginfo') }}">More Information about CITES</a>
                    </p>
                </div>
            </div>

            <!-- How much does the shipping cost? -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">How much does the shipping cost?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        Shipping costs can be varied depending on volume and weight. Once your order completed, we scale
                        the items and request the rate from the courier, then we let you know how much is the shipping
                        cost.
                    </p>
                </div>
            </div>

            <!-- Do I need to pay shipping tax? -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">Do I need to pay shipping tax?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        Yes, you do. Shipping tax needs to be paid by the recipient and the fee can be varied depending
                        on the country. Please check the custom of your country regarding the fee.
                    </p>
                </div>
            </div>

            <!-- What is the payment method? -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">What is the payment method?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        We accept bank transfers, Western Union and PayPal. Payment with PayPal will be added 5% on top
                        of the total amount.
                    </p>
                </div>
            </div>

        </div>
    </section>




    <!-- Footer -->
    @include('partials.footeris')



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
        $(".js-select2").each(function() {
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
                    enabled: true
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
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
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
