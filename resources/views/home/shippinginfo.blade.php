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
            Shipping Information
        </h2>
    </section>


    <!-- breadcrumb -->


    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">

            <!-- What is CITES -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">What is CITES?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        CITES (<strong>the Convention on International Trade in Endangered Species of Wild Fauna and
                            Flora</strong>) is an international agreement between governments. Its aim is to ensure that
                        international trade in specimens of wild animals and plants does not threaten the survival of
                        the species.
                    </p>
                </div>
            </div>

            <!-- How CITES Works -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">How CITES Works?</h3>
                    <p class="stext-113 cl6 p-b-26">
                        CITES works by subjecting international trade in specimens of selected species to certain
                        controls. All import, export, re-export and introduction from the sea of species covered by the
                        Convention has to be authorized through a licensing system. Each Party to the Convention must
                        designate one or more Management Authorities in charge of administering that licensing system
                        and one or more Scientific Authorities to advise them on the effects of trade on the status of
                        the species.
                        <br><br>
                        For more information about CITES click <a href="https://cites.org/eng" target="_blank">here</a>.
                    </p>
                </div>
            </div>

            <!-- Shipping with CITES -->
            <div class="row p-b-75 justify-content-center">
                <div class="col-md-10 col-lg-8 text-start">
                    <h3 class="mtext-111 cl2 p-b-16">SHIPPING WITH CITES</h3>

                    <ul style="list-style-type: disc; padding-left: 20px;">
                        <li class="stext-113 cl6 p-b-26">CITES is a must require document to export the python leather
                            goods to other countries from Indonesia.</li>
                        <li class="stext-113 cl6 p-b-26">CITES is issued in Jakarta Indonesia.</li>
                        <li class="stext-113 cl6 p-b-26">You need CITES no matter how many quantities of the goods that
                            you wanted to export, maximum 200 pcs of goods (Including bags, clutch, wallet, belt, etc).
                        </li>
                        <li class="stext-113 cl6 p-b-26">Price of the CITES is IDR 7,000,000 (price could be change
                            without confirmation).</li>
                        <li class="stext-113 cl6 p-b-26">More than 200 pcs of goods, you need another CITES document
                            (price would be adjusted depend on how many quantities of python leathers).</li>
                        <li class="stext-113 cl6 p-b-26">You need permit from your own country (Every country has
                            different rules, so please check with your government first regarding the permit). e.g. for
                            USA the one that issued the permit is from Department of the Interior U.S. Fish and
                            Wildlife.</li>
                    </ul>

                    <p class="stext-113 cl6 p-b-26">
                        Note: We can ship without CITES, but we cannot guarantee that the goods will be safe arrived in
                        your hand or be held by the custom in your airport. (except for Europe, all shipping to Europe
                        must require CITES).
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        Note: For Russia, you need to have a company to do the CITES (cannot be personal). Please check
                        again from your government for more information.
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        *Shipping to Russia isn’t available right now due to conflict.
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
