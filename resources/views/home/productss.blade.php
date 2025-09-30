<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <style>
        body {
            padding-top: 0px;
            background-color: #fafafa;
        }

        /* Pinterest-style Grid Layout - PAKSA 4 KOLOM */
        .masonry-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 20px 0;
            width: 100%;
        }

        /* Paksa tetap 4 kolom di semua ukuran desktop */
        @media (min-width: 769px) {
            .masonry-container {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 15px;
            }
        }

        @media (min-width: 1024px) {
            .masonry-container {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 15px;
            }
        }

        @media (min-width: 1200px) {
            .masonry-container {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 15px;
            }
        }

        @media (min-width: 1400px) {
            .masonry-container {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 15px;
            }
        }

        @media (min-width: 1600px) {
            .masonry-container {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 15px;
            }
        }

        /* Mobile tetap 2 kolom */
        @media (max-width: 768px) {
            .masonry-container {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 10px;
                padding: 15px 0;
            }
        }

        @media (max-width: 480px) {
            .masonry-container {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 10px;
                padding: 10px 0;
            }
        }

        /* Product Card Styling - Full Image with Text Overlay */
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 6px rgba(32, 33, 36, .28);
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
            position: relative;
            display: block;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(32, 33, 36, .28);
        }

        .product-image {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            transition: transform 0.3s ease;
            display: block;
        }

        .product-card:hover .product-image img {
            transform: scale(1.02);
        }

        /* Pinterest-style random heights menggunakan grid-row-end */
        .product-card:nth-child(6n+1) {
            grid-row-end: span 26;
        }

        .product-card:nth-child(6n+2) {
            grid-row-end: span 18;
        }

        .product-card:nth-child(6n+3) {
            grid-row-end: span 22;
        }

        .product-card:nth-child(6n+4) {
            grid-row-end: span 20;
        }

        .product-card:nth-child(6n+5) {
            grid-row-end: span 24;
        }

        .product-card:nth-child(6n+6) {
            grid-row-end: span 19;
        }

        /* Variasi tambahan untuk lebih natural */
        .product-card:nth-child(8n+1) {
            grid-row-end: span 28;
        }

        .product-card:nth-child(8n+3) {
            grid-row-end: span 17;
        }

        .product-card:nth-child(8n+5) {
            grid-row-end: span 25;
        }

        .product-card:nth-child(8n+7) {
            grid-row-end: span 21;
        }

        /* Atau alternatif dengan aspect-ratio yang lebih natural */
        .product-card:nth-child(10n+1) .product-image {
            aspect-ratio: 3/4;
        }

        .product-card:nth-child(10n+2) .product-image {
            aspect-ratio: 4/3;
        }

        .product-card:nth-child(10n+3) .product-image {
            aspect-ratio: 1/1;
        }

        .product-card:nth-child(10n+4) .product-image {
            aspect-ratio: 2/3;
        }

        .product-card:nth-child(10n+5) .product-image {
            aspect-ratio: 3/2;
        }

        .product-card:nth-child(10n+6) .product-image {
            aspect-ratio: 5/4;
        }

        .product-card:nth-child(10n+7) .product-image {
            aspect-ratio: 4/5;
        }

        .product-card:nth-child(10n+8) .product-image {
            aspect-ratio: 3/4;
        }

        .product-card:nth-child(10n+9) .product-image {
            aspect-ratio: 1/1;
        }

        .product-card:nth-child(10n+10) .product-image {
            aspect-ratio: 2/3;
        }

        /* Mobile: tinggi seragam */
        @media (max-width: 768px) {
            .product-card {
                grid-row-end: auto !important;
            }

            /* .product-card .product-image {
                aspect-ratio: 1/1 !important;
            } */
        }

        /* Product Overlay - Pinterest Style */
        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 16px 16px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .quick-view-btn {
            background: #404040;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 24px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            transform: scale(0.9);
            opacity: 0;
        }

        .product-card:hover .quick-view-btn {
            transform: scale(1);
            opacity: 1;
        }

        .quick-view-btn:hover {
            background: #404040;
            transform: scale(1.05);
        }

        /* Product Info - Overlay di atas gambar */
        /* .product-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 14px 16px;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.75) 0%,
                    rgba(0, 0, 0, 0.45) 50%,
                    rgba(0, 0, 0, 0.15) 85%,
                    transparent 100%);
            color: #fff;
            border-radius: 0 0 16px 16px;
            opacity: 1;
            transform: none;
        } */

        .product-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 16px;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.55) 0%,
                    rgba(0, 0, 0, 0.35) 40%,
                    rgba(0, 0, 0, 0.15) 80%,
                    transparent 100%);
            color: white;
            border-radius: 0 0 16px 16px;
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.3s ease;
        }


        .product-card:hover .product-info {
            transform: translateY(0);
            opacity: 1;
        }

        .product-category {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            margin-bottom: 4px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 700;
            color: white;
            line-height: 1.3;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price-section {
            display: flex;
            flex-direction: column;
            gap: 2px;
            margin-bottom: 8px;
        }

        .current-price {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
        }

        .original-price {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: line-through;
        }

        .product-actions-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .share-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
            padding: 6px;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .share-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .share-btn img {
            width: 14px;
            height: 14px;
            transition: transform 0.3s ease;
            filter: brightness(0) invert(1);
        }

        /* Filter Section Enhancement - Pinterest Style */
        .filter-section {
            padding: 24px;
            margin-bottom: 32px;
            border-radius: 16px;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
        }

        .filter-btn {
            background: transparent;
            border: 1px solid #ccc;
            padding: 12px 20px;
            border-radius: 24px;
            color: #333;
            font-weight: 200;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 14px;
        }

        .filter-btn:hover,
        .filter-btn.how-active1 {
            border-color: #404040;
            color: #404040;
        }

        /* Tombol Control (Search & Sort) */
        .search-sort-controls {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .control-btn {
            background: transparent;
            border: 2px solid #ccc;
            padding: 12px 20px;
            border-radius: 24px;
            color: #333;
            font-weight: 200;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .control-btn:hover {
            border-color: #404040;
            color: #404040;
        }


        .filter-btn:hover,
        .filter-btn.how-active1 {
            background: transparent;
            border-color: #404040;
            color: #404040;
        }

        .search-sort-controls {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .control-btn {
            background: transparent;
            border: 2px solid #ccc;
            padding: 12px 20px;
            border-radius: 24px;
            color: #333;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .control-btn:hover {
            border-color: #404040;
            color: #404040;
        }

        /* Search and Filter Panels */
        .search-panel,
        .filter-panel {
            margin-top: 16px;
            padding: 20px;
            /* border: 1px solid #ddd; */
            /* ganti background jadi border */
            border-radius: 12px;
            display: none;
        }

        .search-panel.show,
        .filter-panel.show {
            display: block;
        }

        /* Form Pencarian */
        .search-form {
            display: flex;
            gap: 12px;
        }

        .search-input {
            flex: 1;
            padding: 14px 18px;
            border: 2px solid #ccc;
            border-radius: 24px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: #404040;
        }

        .search-btn {
            background: transparent;
            color: #404040;
            border: 2px solid #404040;
            padding: 14px 24px;
            border-radius: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .search-btn:hover {
            background: #404040;
            color: white;
        }

        /* Sort Options */
        .sort-options {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .sort-option {
            background: transparent;
            border: 2px solid #ccc;
            padding: 10px 18px;
            border-radius: 20px;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sort-option:hover,
        .sort-option.active {
            border-color: #404040;
            color: #404040;
            background: transparent;
            /* tetap transparan */
        }

        /* Pagination styling - Pinterest Style */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            padding: 20px;
        }

        .pagination li {
            display: inline-block;
            margin: 0 4px;
        }

        .pagination li a,
        .pagination li span {
            padding: 12px 16px;
            background-color: white;
            color: #333;
            border-radius: 24px;
            text-decoration: none;
            transition: 0.3s ease;
            border: 2px solid #efefef;
            font-weight: 600;
        }

        .pagination li.active span {
            background-color: #404040;
            color: #fff;
            border-color: #404040;
        }

        .pagination li a:hover {
            background-color: #404040;
            color: #fff;
            border-color: #404040;
        }

        /* mobile */
        /* Mobile (≤576px) */
        @media (max-width: 576px) {
            .filter-section {
                padding: 16px;
                margin-bottom: 24px;
            }

            .filter-buttons,
            .search-sort-controls,
            .sort-options {
                gap: 8px;
                /* jarak antar tombol lebih rapat */
                margin-bottom: 16px;
            }

            .filter-btn,
            .control-btn,
            .search-input,
            .search-btn,
            .sort-option {
                font-size: 12px;
                padding: 8px 14px;
                border-radius: 18px;
                margin-bottom: 8px;
                /* kasih jarak antar elemen kalau wrap ke bawah */
            }

            .search-form {
                flex-direction: column;
                /* input & tombol ke bawah kalau sempit */
            }

            .search-input {
                width: 100%;
                /* biar full lebar */
            }

            .search-btn {
                width: 100%;
                /* tombol juga full */
            }

            .search-panel,
            .filter-panel {
                padding: 16px;
                margin-top: 6px;
                /* jarak panel dari atas */
            }
        }
    </style>
</head>

<body class="animsitions">

    <!-- Header -->
    @include('partials.navbarcoba')
    <br><br><br>

    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">


            <!-- Enhanced Filter Section -->
            <div class="filter-section">
                <div class="flex-w flex-sb-m p-b-20">
                    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                        <button class="filter-btn how-active1" data-filter="*">
                            All Products
                        </button>

                        @foreach ($kategoris as $kategori)
                            <button class="filter-btn" data-filter=".{{ strtolower($kategori->nama) }}">
                                {{ $kategori->nama }}
                            </button>
                        @endforeach
                    </div>

                    <div class="search-sort-controls">
                        <button class="control-btn js-show-filter">
                            <i class="icon-filter cl2 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                            <i class="icon-close-filter cl2 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                            Filter
                        </button>

                        <button class="control-btn js-show-search">
                            <i class="icon-search cl2 fs-15 trans-04 zmdi zmdi-search"></i>
                            <i class="icon-close-search cl2 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                            Search
                        </button>
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <form action="{{ route('home.productss') }}" method="GET" class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Search products..."
                            value="{{ request('search') }}">
                        <button type="submit" class="search-btn">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="filter-panel show">
                        <h6 class="fw-bold mb-3">Sort By</h6>
                        <div class="sort-options">
                            <div class="sort-option active filter-link" data-sort="default">Default</div>
                            <div class="sort-option filter-link" data-sort="newest">Newest</div>
                            <div class="sort-option filter-link" data-sort="price_low">Price: Low to High</div>
                            <div class="sort-option filter-link" data-sort="price_high">Price: High to Low</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Masonry Products Container -->
            <div class="masonry-container product-container">
                @foreach ($products as $product)
                    <div class="product-card isotope-item {{ strtolower($product->kategori->nama) }}"
                        data-color="{{ $product->color }}"
                        data-price="{{ $product->harga_diskon ?? $product->harga }}">

                        <div class="product-image">
                            <a href="{{ route('home.detail', $product->slug) }}">
                                @if ($product->photos->isNotEmpty())
                                    <img src="{{ product_image_url($product->photos->first()->foto) }}"
                                        alt="{{ $product->nama }}" loading="lazy">
                                @else
                                    <img src="{{ asset('images/default-product.jpg') }}" alt="Default Product">
                                @endif

                            </a>
                        </div>




                        <div class="product-info">
                            <div class="product-category">{{ $product->kategori->nama }}</div>

                            <div class="product-name js-name-b2">
                                {{ $product->nama }}
                            </div>

                            <div class="product-price-section">
                                @if ($product->status === 'active' && $product->harga_diskon)
                                    <span class="current-price">
                                        Rp {{ number_format($product->harga_diskon, 0, ',', '.') }}
                                    </span>
                                    <span class="original-price">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>
                                @else
                                    <span class="current-price">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>

                            <div class="product-actions-bottom">
                                <small class="text-muted"></small>
                                <button class="share-btn js-share-b2"
                                    data-url="{{ route('home.detail', $product->slug) }}"
                                    data-title="{{ $product->nama }}"
                                    data-text="Lihat produk keren ini: {{ $product->nama }}">
                                    <img src="{{ asset('images/icons/share.png') }}" alt="Share">
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $products->links() }}
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

    <!-- Scripts -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    {{-- <script src="vendor/animsition/js/animsition.min.js"></script> --}}
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    {{-- <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script> --}}
    {{-- <script src="vendor/slick/slick.min.js"></script> --}}
    {{-- <script src="js/slick-custom.js"></script>
    <script src="vendor/parallax100/parallax100.js"></script>
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script> --}}
    <script src="vendor/isotope/isotope.pkgd.min.js"></script>
    {{-- <script src="vendor/sweetalert/sweetalert.min.js"></script> --}}
    {{-- <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script> --}}
    <script src="js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simpan semua produk saat halaman pertama kali dimuat
            const allProducts = Array.from(document.querySelectorAll('.isotope-item'));

            function getFilterParams() {
                const kategori = document.querySelector('.filter-tope-group .how-active1').getAttribute(
                    'data-filter');
                const sort = document.querySelector('.filter-link.active[data-sort]')?.getAttribute('data-sort') ||
                    'default';
                const color = document.querySelector('.filter-link.active[data-color]')?.getAttribute(
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
                const products = allProducts;

                // Tampilkan/sembunyikan produk berdasarkan filter
                products.forEach(item => {
                    const matchKategori = params.kategori === '*' ||
                        item.classList.contains(params.kategori.replace('.', ''));
                    const matchColor = params.color === 'all' ||
                        item.getAttribute('data-color') === params.color;
                    if (matchKategori && matchColor) {
                        item.style.display = 'inline-block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Sorting
                const visibleProducts = products.filter(p => p.style.display !== 'none');
                visibleProducts.sort((a, b) => {
                    const priceA = parseFloat(a.getAttribute('data-price'));
                    const priceB = parseFloat(b.getAttribute('data-price'));
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
            document.querySelectorAll('.sort-option[data-sort]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.sort-option[data-sort]').forEach(l => {
                        l.classList.remove('active');
                    });
                    this.classList.add('active');
                    applyFilter();
                });
            });

            // Toggle panels
            document.querySelector('.js-show-search').addEventListener('click', function() {
                const panel = document.querySelector('.panel-search');
                panel.classList.toggle('dis-none');
                document.querySelector('.panel-filter').classList.add('dis-none');
            });

            document.querySelector('.js-show-filter').addEventListener('click', function() {
                const panel = document.querySelector('.panel-filter');
                panel.classList.toggle('dis-none');
                document.querySelector('.panel-search').classList.add('dis-none');
            });

            // Share functionality
            document.querySelectorAll('.js-share-b2').forEach(btn => {
                btn.addEventListener('click', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const url = this.getAttribute('data-url');
                    const title = this.getAttribute('data-title');
                    const text = this.getAttribute('data-text');

                    if (navigator.share) {
                        try {
                            await navigator.share({
                                title,
                                text,
                                url
                            });
                        } catch (err) {
                            console.warn('Share cancelled or failed:', err);
                        }
                    } else if (navigator.clipboard) {
                        try {
                            await navigator.clipboard.writeText(url);
                            alert('Link disalin ke clipboard:\n' + url);
                        } catch {
                            window.prompt('Copy this link:', url);
                        }
                    } else {
                        window.prompt('Copy this link:', url);
                    }
                });
            });

            // Inisialisasi awal
            applyFilter();
        });
    </script>

</body>

</html>
