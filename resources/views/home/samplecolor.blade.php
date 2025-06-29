<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	{!! SEOMeta::generate() !!}
	{!! OpenGraph::generate() !!}
	{!! JsonLd::generate() !!}

    <!-- Favicon -->
     <link rel="icon" style="width: 100%" type="image/png" href="{{ asset('images/icons/logoernovnewwhite.svg') }}"/>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <style>
    .zoom-hover {
        transition: transform 0.3s ease; /* animasi smooth */
    }
    .zoom-hover:hover {
        transform: scale(1.1); /* zoom in saat hover */
    }
</style>

</head>

<body class="animsition">
	<!-- Navbar -->
	@include('partials.navbartwo')

	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('bag.png') }}');">
		<h2 class="ltext-105 cl0 txt-center" style="color: #404040;">
			Sample Colors
		</h2>
	</section>	

	<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row">
            @forelse($samples as $sample)
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ asset('storage/' . $sample->foto) }}" class="popup-image">
                            @if($sample->foto)
                            <img src="{{ asset('storage/' . $sample->foto) }}" class="card-img-top zoom-hover" alt="{{ $sample->kode_sample }}">
                        @else
                            <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top zoom-hover" alt="Default Image">
                        @endif

                        </a>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold">{{ $sample->kode_sample }}</h5>
                            <p class="card-text">
                                
                                @if($sample->status === \App\Enums\Status::ACTIVE)
                                    <span class="badge bg-success">{{ $sample->status->value }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $sample->status->value }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No sample colors available.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $samples->links() }}
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

    <!-- Scripts -->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('js/slick-custom.js') }}"></script>
	<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
	<script>$('.parallax100').parallax100();</script>
	<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
    <script>
    $(document).ready(function() {
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: false // hanya gambar yang diklik yang muncul
        },
        mainClass: 'mfp-fade',
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out'
        }
    });
});


</script>

</body>
</html>
