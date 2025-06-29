<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{{-- <title>Contact</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
	{!! SEOTools::generate() !!}

    <!-- Favicon -->
   <!--===============================================================================================-->	
 	<link rel="icon" style="width: 100%" type="image/png" href="{{ asset('images/icons/logoernovnewwhite.svg') }}"/>
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
			Contact
		</h2>
	</section>	
	

	<!-- breadcrumb -->


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
    <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            {{-- Honeypot (anti-bot) --}}
            <input type="text" name="website" style="display: none;">

            <h4 class="mtext-105 cl2 txt-center p-b-30">
                Send Us A Message
            </h4>

            <div class="bor8 m-b-20 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
                       type="text" name="email" placeholder="Your Email Address" required>
                <img class="how-pos4 pointer-none" src="{{ asset('images/icons/icon-email.png') }}" alt="ICON">
            </div>

            <div class="bor8 m-b-30">
                <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25"
                          name="message" placeholder="How Can We Help?" required></textarea>
            </div>

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                Submit
            </button>
        </form>

        {{-- Flash message sukses --}}
        @if(session('success'))
            <div class="alert alert-success p-t-20">{{ session('success') }}</div>
        @endif

        {{-- Flash message error --}}
        @if(session('error'))
            <div class="alert alert-danger p-t-20">{{ session('error') }}</div>
        @endif
    </div>





				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-107 cl7 size-201 font-bold" style="font-size: 16px;">
                                Factory
                            </p>
                            
                            <ul class="contact-list">
                                <li class="stext-107 cl7">Jalan Mekar Jaya II Blok A12 Graha Dewata Pemogan No.1 Denpasar Selatan, Bali</li>
                            </ul>
							<br><br>
                            <p class="stext-107 cl7 size-201 font-bold" style="font-size: 16px;">
                                Store
                            </p>
                            <ul class="contact-list">
                                <li class="stext-107 cl7">Ernov Kayu Jati: Jl. Kayu Jati No. 3A Seminyak-Bali</li>
                                <li class="stext-107 cl7">Ernov Kayu Jati: Jl. Kayu Jati No. 4D Seminyak-Bali</li>
                                <li class="stext-107 cl7">Ernov Batubelig: Jl. Batu Belig No.3A Petitenget-Bali</li>
                            </ul>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+628179703388
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sales Support
							</span>

							<a href="https://wa.me/6285318177763" target="_blank"
							class="stext-115 cl1 size-213 p-t-18 d-block bg-success text-white p-2 rounded mt-2">
								<img src="{{ asset('images/icons/wa.png') }}" alt="WhatsApp"
									style="height: 20px; vertical-align: middle; margin-right: 8px;">
								Chat via WhatsApp
							</a>
						</div>


					</div>

					</div>
				</div>
			</div>
            <h3 class="mtext-105 cl2 txt-center p-b-30">Ernov Factory</h3>
        
            <div style="width: 100%; height: 300px; overflow: hidden;">
                <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1971.9282770277703!2d115.20002797836189!3d-8.70516931745741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2472cc060674f%3A0xa3efdb78e5a76c7b!2sErnov%20Factory!5e0!3m2!1sid!2sid!4v1743949526934!5m2!1sid!2sid" 
                  width="100%" 
                  height="300" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <br><br><br>
            <h3 class="mtext-105 cl2 txt-center p-b-30">Ernov Store - BatuBelig</h3>
        
            <div style="width: 100%; height: 300px; overflow: hidden;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.213972760104!2d115.15569909074793!3d-8.67119065740305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2476b9cd3c1f9%3A0x4db5a890404605a!2sErnov%20-%20Batu%20Belig!5e0!3m2!1sid!2sid!4v1743950176079!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <br><br><br>
            <h3 class="mtext-105 cl2 txt-center p-b-30">Ernov Store - Kayu Jati</h3>
        
            <div style="width: 100%; height: 300px; overflow: hidden;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.0933913250105!2d115.15178199678957!3d-8.682668699999969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24710f75cd44b%3A0x646dfa8ddd025fb5!2sErnov%20-%20Kayu%20Jati!5e0!3m2!1sid!2sid!4v1743950355635!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <br><br><br>
            <h3 class="mtext-105 cl2 txt-center p-b-30">Ernov Store - Kayu Jati</h3>
        
            <div style="width: 100%; height: 300px; overflow: hidden;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1972.0479795812337!2d115.15265544671959!3d-8.68242442668697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24710579b0b63%3A0x83807fab92eb4ce3!2sERIAL!5e0!3m2!1sid!2sid!4v1743950434045!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>
              
		</div>
	</section>	
	
	
	<!-- Map -->
      
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
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
	
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    
</body>
</html>