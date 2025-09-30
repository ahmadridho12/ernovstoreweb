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
        .product-info {
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
        }


        /* .product-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 16px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.5) 50%, transparent 100%);
            color: white;
            border-radius: 0 0 16px 16px;
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-card:hover .product-info {
            transform: translateY(0);
            opacity: 1;
        } */

        /* kategori kecil dan elegan */
        .product-category {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
            margin-bottom: 2px;
        }

        /* nama lebih rapi dan proporsional */
        .product-name {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            line-height: 1.3;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* harga tampil jelas tapi tetap clean */
        .product-price-section {
            display: flex;
            flex-direction: column;
            gap: 1px;
            margin-bottom: 4px;
        }

        .currentt-price {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
        }

        .originall-price {
            font-size: 12px;
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
    </style>
</head>

<body class="animsition">
    <!-- Navbar -->
    @include('partials.navbarcoba')
    <!-- breadcrumb -->
    <div class="container" style="padding-top: 100px">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <span class="stext-109 cl8">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </span>

            <span class="stext-109 cl8">
                {{ $product->kategori->nama }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </span>

            <span class="stext-109 cl4">
                {{ $product->nama }}
            </span>
        </div>
    </div>



    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach ($product->photos as $photo)
                                    <div class="item-slick3" data-thumb="{{ product_image_url($photo->foto) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ product_image_url($photo->foto) }}"
                                                alt="{{ $product->nama }}" loading="lazy">
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ product_image_url($photo->foto) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->nama }}
                        </h4>

                        <div class="product-price-section">
                            @if ($product->status === 'active' && $product->harga_diskon)
                                <span class="current-price text-danger fw-bold" style="font-size: 20px;">
                                    Rp {{ number_format($product->harga_diskon, 0, ',', '.') }}
                                </span>
                                <span class="original-price text-muted"
                                    style="text-decoration: line-through; margin-left: 8px;">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>
                            @else
                                <span class="current-price fw-bold" style="font-size: 20px;">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>


                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->subjudul }}
                        </p>

                        <!--  -->


                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>



                            <a href="#"
                                class="js-share-b2 fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Share" data-url="{{ url()->current() }}"
                                data-title="{{ $product->nama }}"
                                data-text="Lihat produk keren ini: {{ $product->nama }}">
                                <img src="{{ asset('images/icons/share.png') }}" alt="Share"
                                    style="width:24px; height:24px;">
                            </a>


                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description"
                                role="tab">Description</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                                information</a>
                        </li>


                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {{ $product->deskripsi }}
                                </p>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Weight
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->berat ?? 'N/A' }} Gram
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Dimensions
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->dimensi ?? 'N/A' }}
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Materials
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->material ?? 'N/A' }}
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Color
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->color ?? 'N/A' }}
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Size
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->size ?? 'N/A' }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- - -->

                    </div>
                </div>
            </div>
        </div>


    </section>


    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="mtext-111 cl5 txt-center">Related Products</h3>
            </div>

            <div class="wrap-slick2">
                <div class="slick2">
                    @forelse($relatedProducts as $product)
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <div class="product-card isotope-item {{ strtolower($product->kategori->nama) }}"
                                data-color="{{ $product->color }}"
                                data-price="{{ $product->harga_diskon ?? $product->harga }}">

                                <div class="product-image">
                                    <a href="{{ route('home.detail', $product->slug) }}">
                                        @if ($product->photos->isNotEmpty())
                                            <img src="{{ product_image_url($product->photos->first()->foto) }}"
                                                alt="{{ $product->nama }}" loading="lazy">
                                        @else
                                            <img src="{{ asset('images/default-product.jpg') }}"
                                                alt="Default Product">
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
                                            <span class="currentt-price">
                                                Rp {{ number_format($product->harga_diskon, 0, ',', '.') }}
                                            </span>
                                            <span class="originall-price">
                                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                                            </span>
                                        @else
                                            <span class="currentt-price">
                                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="product-actions-bottom">
                                        <button class="share-btn js-share-b2"
                                            data-url="{{ route('home.detail', $product->slug) }}"
                                            data-title="{{ $product->nama }}"
                                            data-text="Check out this amazing product: {{ $product->nama }}">
                                            <img src="{{ asset('images/icons/share.png') }}" alt="Share">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center w-100">No related products found.</p>
                    @endforelse

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
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    @foreach ($product->photos as $photo)
                                        <div class="item-slick3" data-thumb="{{ product_image_url($photo->foto) }}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ product_image_url($photo->foto) }}"
                                                    alt="{{ $product->nama }}" loading="lazy">
                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="{{ product_image_url($photo->foto) }}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Lightweight Jacket
                            </h4>

                            <span class="mtext-106 cl2">
                                $58.79
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
                                ornare feugiat.
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "has been added to wishlist!", "success");
                $(this).addClass('js-addedwish-b2').off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "has been added to wishlist!", "success");
                $(this).addClass('js-addedwish-detail').off('click');
            });
        });

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "has been added to cart!", "success");
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css({
                'position': 'relative',
                'overflow': 'hidden'
            });
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false
            });

            $(window).on('resize', function() {
                ps.update();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.js-share-b2').forEach(btn => {
                btn.addEventListener('click', async e => {
                    e.preventDefault();
                    const url = btn.dataset.url;
                    const title = btn.dataset.title || document.title;
                    const text = btn.dataset.text || '';

                    // Jika browser mendukung Web Share API
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
                    } else {
                        // Fallback: copy URL ke clipboard
                        if (navigator.clipboard) {
                            try {
                                await navigator.clipboard.writeText(url);
                                alert('Link disalin ke clipboard:\n' + url);
                            } catch (err) {
                                window.prompt('Copy this link:', url);
                            }
                        } else {
                            // Fallback lama
                            window.prompt('Copy this link:', url);
                        }
                    }
                });
            });
        });
    </script>

    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
