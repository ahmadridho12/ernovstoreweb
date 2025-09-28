<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO Meta Tags (Dynamic from Controller via SEOTools) --}}
    {{-- {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!} --}}
    {!! SEOTools::generate() !!}

    <!-- Favicon -->
    <link rel="icon" style="width: 100%" type="image/png" href="{{ asset('images/icons/logoernovnewwhite.svg') }}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('font/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font/linearicons-v1.0.0/icon-font.min.css') }}">

    <!-- Animations -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">

    <!-- Animsition -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">

    <!-- Select2 & DatePicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">

    <!-- Slick Slider & Magnific Popup -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">

    <!-- Perfect Scrollbar -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-pb+Y1mS8oDoLQEPt6vDf8rSM1MZm3yQk8zI4D1jVJYV3sY+f8Z5X09j6+jgq9M5ZeZmczfyXhE2f4p6Uz5+ETQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Contoh CSS custom */
        .category-banner {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 70vh;
            /* misal 50% tinggi viewport */
        }

        .category-banner img {
            width: 100%;
            height: 100%;
            /* Penuhi tinggi container */
            object-fit: cover;
            object-position: center;
        }


        .category-banner .overlay {
            position: absolute;
            top: 20%;
            left: 10%;
            color: white;
            padding: 10px 20px;
            /* background-color: rgba(0, 0, 0, 0.5); Efek transparan untuk keterbacaan */
            border-radius: 5px;
        }

        .category-banner .overlay h3 {
            font-size: 24px;
            margin: 0;
        }

        .category-banner .overlay p {
            font-size: 18px;
            margin: 5px 0 0;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .category-banner .overlay {
                top: 10%;
                left: 5%;
                padding: 5px 10px;
            }
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination li {
            display: inline-block;
            margin: 0 4px;
        }

        .pagination li a,
        .pagination li span {
            padding: 8px 12px;
            background-color: #f5f5f5;
            color: #333;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
        }

        .pagination li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Style lain yang kamu perlukan */
        .block2-pic {
            position: relative;
            width: 100%;
            padding-top: 100%;
            /* tinggi = 100% dari lebar → kotak */
            overflow: hidden;
        }

        .block2-pic img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* gambar fill penuh dan ter–crop */
        }

        /*grid*/
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .item {
            width: 100%;
            height: auto;
        }

        .full {
            grid-column: span 2;
        }

        /* Responsif untuk mobile */
        @media (max-width: 600px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: span 1;
            }
        }


        /* vidio */
        /* GANTI DENGAN INI: */
        .sec-video .container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        .video-section {
            position: relative;
            width: 100%;
            height: 100vh;
            /* penuh layar */
            overflow: hidden;
        }

        .video-wrapper {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .video-placeholder {
            width: 100%;
            height: 100%;
            /* background: linear-gradient(135deg, #8B4513 0%, #CD853F 50%, #D2691E 100%); */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Simulasi figure dalam video */
        .figure {
            width: 300px;
            height: 500px;
            /* background: linear-gradient(45deg, #DAA520, #FFD700); */
            border-radius: 20px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            animation: subtleFloat 6s ease-in-out infinite;
        }

        .figure::before {
            content: '';
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background: none;
            border-radius: 50%;
        }

        .figure::after {
            content: '';
            position: absolute;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 150px;
            background: linear-gradient(180deg, #DAA520, #B8860B);
            border-radius: 10px;
        }

        @keyframes subtleFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(1deg);
            }
        }

        .video-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 2;
            color: #fff;
            font-size: 1rem;
            background: rgba(0, 0, 0, 0.4);
            padding: 6px 12px;
            border-radius: 6px;
        }



        .content-section {
            flex: 1;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 80px 60px;
            position: relative;
        }

        .content-wrapper {
            max-width: 500px;
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-title {
            font-size: 2.8rem;
            font-weight: 300;
            letter-spacing: 0.1em;
            color: #2c2c2c;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 1.4rem;
            font-weight: 300;
            color: #2c2c2c;
            margin-bottom: 2rem;
            letter-spacing: 0.05em;
        }

        .description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 35px;
            background: transparent;
            color: #2c2c2c;
            text-decoration: none;
            border: 2px solid #2c2c2c;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #2c2c2c;
            transition: left 0.3s ease;
            z-index: -1;
        }

        .cta-button:hover::before {
            left: 0;
        }

        .cta-button:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(44, 44, 44, 0.2);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-dot {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(44, 44, 44, 0.1);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .floating-dot:nth-child(1) {
            top: 20%;
            right: 20%;
            animation-delay: 0s;
        }

        .floating-dot:nth-child(2) {
            top: 60%;
            right: 30%;
            animation-delay: 2s;
        }

        .floating-dot:nth-child(3) {
            top: 40%;
            right: 10%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) translateX(0px);
            }

            25% {
                transform: translateY(-20px) translateX(10px);
            }

            50% {
                transform: translateY(-40px) translateX(-5px);
            }

            75% {
                transform: translateY(-20px) translateX(15px);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .video-section {
                height: 100vh;
                /* tetap full layar di mobile */
            }

            .video-player {
                width: 100%;
                height: 100%;
                object-fit: cover;
                /* biar nutupin layar, meski portrait */
            }

            .content-section {
                padding: 30px 20px;
                background: #fff;
            }

            .main-title {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1.1rem;
            }

            .description {
                font-size: 1rem;
            }
        }


        /* untuk vudui box */
        .video-flex {
            display: flex;
            flex-wrap: wrap;
            height: 100vh;
        }

        .video-box {
            flex: 1 1 50%;
            height: 100%;
        }

        .video-box video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* 👇 Aturan khusus untuk layar kecil */
        @media (max-width: 768px) {
            .video-flex {
                height: auto;
                /* biar ga paksa 100vh di mobile */
                flex-direction: column;
            }

            .video-box {
                flex: 1 1 100%;
                height: 50vh;
                /* biar masing-masing video setengah layar */
            }
        }

        .video-flex-container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }
    </style>
</head>

<body class="animsition">

    <!-- Header -->
    @include('partials.navbarcoba')

    <!-- Slider -->
    <section class="section-slide" style="height: 80vh;">
        <div class="wrap-slick1 h-full">
            <div class="slick1 h-full">
                @foreach ($sliders as $slider)
                    <div class="item-slick1 position-relative h-full"
                        style="background-image: url('{{ $slider->foto_url_cache ?? $slider->foto_url }}');
               background-size: cover;
               background-position: center;
               height: 100vh;">
                        <!-- Overlay -->
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                                background-color: rgba(0, 0, 0, 0.2); z-index: 1;">
                        </div>

                        <div class="container h-full" style="position: relative; z-index: 2;">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">
                                        {{ $slider->judul }}
                                    </span>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
                                    data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $slider->nama }}
                                    </h2>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="slideInUp"
                                    data-delay="1600">
                                    <a href="{{ route('home.productss') }}"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <section class="section-video" style="margin-top: 60px;">
        <div class="container-fluid video-flex">

            <!-- Video 1 -->
            <div class="video-box">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('video/portrait-video.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>
            </div>

            <!-- Video 2 -->
            <div class="video-box">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('video/IMG_0734.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>
            </div>

        </div>
    </section>
    <section class="section-video" style="margin-top: 24px;">
        <div class="container-fluid video-flex">

            <!-- Video 1 -->
            <div class="video-box">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('video/ernov2.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>
            </div>

            <!-- Video 2 -->
            <div class="video-box">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('video/ernov1.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>
            </div>

        </div>
    </section>






    <!-- Banner -->


    <section class="sec-video bg0 p-t-80 p-b-50">
        <div class="container">
            <!-- Video Section -->
            <div class="video-section">
                <div class="video-wrapper">
                    <video class="video-player" autoplay muted loop playsinline>
                        <source src="/video/portrait-video.mp4" type="video/mp4">
                        Browser kamu tidak mendukung video tag.
                    </video>
                    <div class="video-overlay">
                        {{-- Video Portfolio • Fall/Winter 2025 --}}
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="content-section">
                <div class="floating-elements">
                    <div class="floating-dot"></div>
                    <div class="floating-dot"></div>
                    <div class="floating-dot"></div>
                </div>

                <div class="content-wrapper">
                    <h1 class="main-title">The ERNOV Collection</h1>
                    <h2 class="subtitle">Elegance in Every Detail</h2>
                    <p class="description">
                        A distinguished line of handcrafted bags, made with premium leather and natural rattan.
                        Each piece is meticulously created by artisans, not machines, ensuring timeless quality,
                        elegance, and professional sophistication for every occasion.
                    </p>

                    <a href="#" class="cta-button">Explore</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Chat Button -->


    <h1 style="text-align: center">Categories</h1>
    <section class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @foreach ($kategoris as $kategori)
                    <div class="col-sm-6 col-md-4 col-xl-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="{{ $kategori->foto_url_cache ?? $kategori->foto_url }}"
                                alt="{{ $kategori->nama }}" loading="lazy">
                            <div class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
                                    <span class="block1-name ltext-102 trans-04 p-b-8">
                                        {{ $kategori->nama }}
                                    </span>
                                    <span class="block1-info stext-102 trans-04">
                                        {{ $kategori->judul }}
                                    </span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <a href="{{ route('home.productss', ['kategori' => $kategori->nama]) }}"
                                        class="block1-link stext-101 cl0 trans-09">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simpan semua produk saat halaman pertama kali dimuat
            const allProducts = Array.from(document.querySelectorAll('.isotope-item'));

            function getFilterParams() {
                const kategori = document.querySelector('.filter-tope-group .how-active1').getAttribute(
                    'data-filter');
                const sort = document.querySelector('.filter-link-active[data-sort]')?.getAttribute('data-sort') ||
                    'default';
                const color = document.querySelector('.filter-link-active[data-color]')?.getAttribute(
                    'data-color') || 'all';
                return {
                    kategori,
                    sort,
                    color
                };
            }

            function applyFilter() {
                const params = getFilterParams();
                const productContainer = document.querySelector('.product-container');
                // Gunakan daftar lengkap produk dari variabel allProducts
                const products = allProducts;

                // Tampilkan/sembunyikan produk berdasarkan filter
                products.forEach(item => {
                    const matchKategori = params.kategori === '*' ||
                        item.classList.contains(params.kategori.replace('.', ''));
                    const matchColor = params.color === 'all' ||
                        item.getAttribute('data-color') === params.color;
                    if (matchKategori && matchColor) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Sorting
                const visibleProducts = products.filter(p => p.style.display !== 'none');
                visibleProducts.sort((a, b) => {
                    const priceA = parseFloat(a.querySelector('.stext-105').textContent.replace('Rp ', '')
                        .replace(/\./g, '').replace(',', '.'));
                    const priceB = parseFloat(b.querySelector('.stext-105').textContent.replace('Rp ', '')
                        .replace(/\./g, '').replace(',', '.'));
                    switch (params.sort) {
                        case 'price_low':
                            return priceA - priceB;
                        case 'price_high':
                            return priceB - priceA;
                        case 'newest':
                            return 0;
                        default:
                            return 0;
                    }
                });

                // Hapus produk lama dari container
                productContainer.innerHTML = '';

                // Tambahkan kembali produk yang telah difilter dan disorting
                visibleProducts.forEach(product => {
                    productContainer.appendChild(product);
                });
            }

            // Event Listener untuk Kategori
            document.querySelectorAll('.filter-tope-group button').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelectorAll('.filter-tope-group button').forEach(btn => {
                        btn.classList.remove('how-active1');
                    });
                    this.classList.add('how-active1');
                    applyFilter();
                });
            });

            // Event Listener untuk Sorting
            document.querySelectorAll('.filter-link[data-sort]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.filter-link[data-sort]').forEach(l => {
                        l.classList.remove('filter-link-active');
                    });
                    this.classList.add('filter-link-active');
                    applyFilter();
                });
            });

            // Event Listener untuk Warna
            document.querySelectorAll('.filter-link[data-color]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.filter-link[data-color]').forEach(l => {
                        l.classList.remove('filter-link-active');
                    });
                    this.classList.add('filter-link-active');
                    applyFilter();
                });
            });

            // Inisialisasi awal
            applyFilter();
        });
    </script>
    <script>
        // Handle video loading errors
        const video = document.querySelector('.main-video');
        const videoWrapper = document.querySelector('.video-wrapper');

        // FIX: Tambahkan null check
        if (video && videoWrapper) {
            video.addEventListener('error', function() {
                videoWrapper.innerHTML = `
                <div class="video-placeholder">
                    <div class="placeholder-text">
                        <strong>Video Portfolio</strong><br>
                        Letakkan file video Anda di:<br>
                        <code>public/video/portrait-video.mov</code><br><br>
                        Format yang didukung: MOV, MP4, WebM
                    </div>
                </div>
                <div class="video-overlay">
                    Video Portfolio • Fall/Winter 2025
                </div>
            `;
            });
        }

        // Video interaction effects
        const videoSection = document.querySelector('.video-section');

        // FIX: Tambahkan null check
        if (videoSection && video) {
            videoSection.addEventListener('mouseenter', () => {
                if (video && !video.error) {
                    video.playbackRate = 0.8;
                }
            });

            videoSection.addEventListener('mouseleave', () => {
                if (video && !video.error) {
                    video.playbackRate = 1;
                }
            });
        }

        // Chat button interaction
        const chatButton = document.querySelector('.chat-button');
        // FIX: Tambahkan null check
        if (chatButton) {
            chatButton.addEventListener('click', () => {
                alert('Fitur chat akan segera hadir!');
            });
        }

        // Smooth scrolling untuk mobile
        if (window.innerWidth <= 768) {
            document.body.style.overflow = 'auto';
        }
    </script>

    <!-- Dan ganti script filter ini dengan null checks: -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const allProducts = Array.from(document.querySelectorAll('.isotope-item'));

            function getFilterParams() {
                // FIX: Tambahkan null checks
                const kategoriBtns = document.querySelector('.filter-tope-group .how-active1');
                const kategori = kategoriBtns ? kategoriBtns.getAttribute('data-filter') : '*';

                const sortLink = document.querySelector('.filter-link-active[data-sort]');
                const sort = sortLink ? sortLink.getAttribute('data-sort') : 'default';

                const colorLink = document.querySelector('.filter-link-active[data-color]');
                const color = colorLink ? colorLink.getAttribute('data-color') : 'all';

                return {
                    kategori,
                    sort,
                    color
                };
            }

            function applyFilter() {
                const params = getFilterParams();
                const productContainer = document.querySelector('.product-container');

                // FIX: Return jika container tidak ada
                if (!productContainer) return;

                const products = allProducts;

                products.forEach(item => {
                    const matchKategori = params.kategori === '*' ||
                        item.classList.contains(params.kategori.replace('.', ''));
                    const matchColor = params.color === 'all' ||
                        item.getAttribute('data-color') === params.color;
                    if (matchKategori && matchColor) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                const visibleProducts = products.filter(p => p.style.display !== 'none');
                visibleProducts.sort((a, b) => {
                    // FIX: Tambahkan null checks untuk querySelector
                    const priceElA = a.querySelector('.stext-105');
                    const priceElB = b.querySelector('.stext-105');

                    if (!priceElA || !priceElB) return 0;

                    const priceA = parseFloat(priceElA.textContent.replace('Rp ', '')
                        .replace(/\./g, '').replace(',', '.'));
                    const priceB = parseFloat(priceElB.textContent.replace('Rp ', '')
                        .replace(/\./g, '').replace(',', '.'));

                    switch (params.sort) {
                        case 'price_low':
                            return priceA - priceB;
                        case 'price_high':
                            return priceB - priceA;
                        case 'newest':
                            return 0;
                        default:
                            return 0;
                    }
                });

                productContainer.innerHTML = '';
                visibleProducts.forEach(product => {
                    productContainer.appendChild(product);
                });
            }

            // Event Listeners tetap sama...
            document.querySelectorAll('.filter-tope-group button').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelectorAll('.filter-tope-group button').forEach(btn => {
                        btn.classList.remove('how-active1');
                    });
                    this.classList.add('how-active1');
                    applyFilter();
                });
            });

            document.querySelectorAll('.filter-link[data-sort]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.filter-link[data-sort]').forEach(l => {
                        l.classList.remove('filter-link-active');
                    });
                    this.classList.add('filter-link-active');
                    applyFilter();
                });
            });

            document.querySelectorAll('.filter-link[data-color]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.filter-link[data-color]').forEach(l => {
                        l.classList.remove('filter-link-active');
                    });
                    this.classList.add('filter-link-active');
                    applyFilter();
                });
            });

            applyFilter();
        });
    </script>

    @if (request()->has('search'))
        <script>
            window.addEventListener('load', function() {
                const produkSection = document.getElementById('produk');
                if (produkSection) {
                    produkSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        </script>
    @endif

</body>

</html>
