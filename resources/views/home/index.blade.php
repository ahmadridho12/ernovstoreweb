<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO Meta Tags (Dynamic from Controller via SEOTools) --}}
    {{-- {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!} --}}
	{!! SEOTools::generate() !!}

 <!-- Favicon -->
 <link rel="icon" style="width: 100%" type="image/png" href="{{ asset('images/icons/logoernovnewwhite.svg') }}"/>

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
  height: 70vh;            /* misal 50% tinggi viewport */
}

.category-banner img {
  width: 100%;
  height: 100%;            /* Penuhi tinggi container */
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

    .pagination li a, .pagination li span {
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
  padding-top: 100%;    /* tinggi = 100% dari lebar → kotak */
  overflow: hidden;
}

.block2-pic img {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;    /* gambar fill penuh dan ter–crop */
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

</style>
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('partials.navbar')
	
	<!-- Slider -->
	<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach ($sliders as $slider)
                <div class="item-slick1 position-relative" style="background-image: url('{{ asset('storage/' . $slider->foto) }}'); background-size: cover; background-position: center;">
                    <!-- Overlay hitam transparan -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.2); z-index: 1;"></div>
                    
                    <div class="container h-full" style="position: relative; z-index: 2;">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <!-- Layer: Menampilkan nama slider -->
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    {{ $slider->judul }}
                                </span>
                            </div>
                            <!-- Layer: Menampilkan judul slider -->
                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    {{ $slider->nama }}
                                </h2>
                            </div>
                            <!-- Layer: Tombol Shop Now -->
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ route('home.productss') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
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
{{-- <div class="grid-container">
  <img src="/images/ernov1.jpg" alt="Gambar 1" class="item">
  <img src="/images/ernov2.jpg" alt="Gambar 2" class="item">
  <img src="/images/ernov3.jpg" alt="Gambar 3" class="item full">
</div> --}}

	


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				@foreach($kategoris as $kategori)
                <div class="col-sm-6 col-md-4 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
						<div class="block1 wrap-pic-w">
							<img src="{{ asset('storage/' . $kategori->foto) }}" alt="IMG-BANNER">
							<a href="{{ route('home.productss', ['kategori' => $kategori->nama]) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
								<div class="block1-txt-child1 flex-col-l">
									<!-- Ganti "Women" dengan nama kategori -->
									<span class="block1-name ltext-102 trans-04 p-b-8">
										{{ $kategori->nama }}
									</span>
									<!-- Ganti "Spring 2018" dengan judul kategori -->
									<span class="block1-info stext-102 trans-04">
										{{ $kategori->judul }}
									</span>
								</div>
								<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl0 trans-09">
										Shop Now
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>



	@foreach($kategoris as $kategori)
	<!-- Banner Kategori -->
	<h3 class="mtext-111 cl5 txt-center">
		{{ $kategori->nama }}
	</h3>
	<br>
	<section class="category-banner">
		<div class="overlay">
			<h1>{{ $kategori->nama }} Collection</h1>
			<p>A premium collection of selected bags to add style with selected materials</p>
		</div>
	
		@if($kategori->foto_sampul)
			<img src="{{ asset('storage/' . $kategori->foto_sampul) }}" alt="{{ $kategori->nama }}">
		@else
			<img src="{{ asset('images/default-banner.jpg') }}" alt="{{ $kategori->nama }}">
		@endif
	</section>

	<!-- Produk dari kategori tersebut -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($kategori->products()->take(10)->get() as $product)
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<div class="block2">
								<div class="block2-pic hov-img0">
									@if($product->photos->isNotEmpty())
										<img src="{{ asset('storage/' . $product->photos->first()->foto) }}" alt="{{ $product->nama }}">
									@else
										<img src="{{ asset('images/default.png') }}" alt="{{ $product->nama }}">
									@endif
									<a href="{{ route('home.detail', $product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										Quick View
									</a>
								</div>
	
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<!-- Nama Produk -->
										<span 
								class="stext-104 cl4 js-name-b2 p-b-6" 
								style="font-size: 16px; line-height: 19px; font-weight: 500; color: #404040;">
									{{ $product->nama }}
							</span>


							@if ($product->status === 'active' && $product->harga_diskon)
								<span class="stext-105" style="font-size: 16px; font-weight: 500; line-height: 19px; color: #404040;">
									Rp {{ number_format($product->harga_diskon, 0, ',', '.') }}
								</span>
								<span class="stext-105" style="font-size: 14px; line-height: 19px; text-decoration: line-through; color: #E0E0E0;">
									Rp {{ number_format($product->harga, 0, ',', '.') }}
								</span>
							@else
								<span class="stext-105" style="font-size: 16px; font-weight: bold; line-height: 19px; color: #404040;">
									Rp {{ number_format($product->harga, 0, ',', '.') }}
								</span>
							@endif
									</div>
									
	
									{{-- <div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
										</a>
									</div> --}}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	
	
@endforeach


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					@foreach($kategoris as $kategori)
    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ strtolower($kategori->nama) }}">
        {{ $kategori->nama }}
    </button>
    @endforeach
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

								<!-- Tombol show/hide search -->
				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
				</div>

<!-- Panel Search -->
<div class="dis-none panel-search w-full p-t-10 p-b-15">
    <form 
        action="{{ route('home') }}" 
        method="GET" 
        class="bor8 dis-flex p-l-15 w-full"
    >
        <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
            <i class="zmdi zmdi-search"></i>
        </button>

        <input 
            class="mtext-107 cl2 size-114 plh2 p-r-15" 
            type="text" 
            name="search" 
            placeholder="Search..." 
            value="{{ request('search') }}"
        >
    </form>
</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04" data-sort="default">
										Default
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04" data-sort="newest">
										Newness
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04" data-sort="price_low">
										Price: Low to High
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04" data-sort="price_high">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active" data-color="all">
										All Colors
									</a>
								</li>
								@foreach($colors as $color)
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: {{ $color }};">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="#" class="filter-link stext-106 trans-04" data-color="{{ $color }}">
										{{ $color }}
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="container" >
				<div class="row product-container" id="produk">
					@foreach($products as $product)
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ strtolower($product->kategori->nama) }}"
							 data-color="{{ $product->color }}">
							<!-- Block2 produk -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									@if($product->photos->isNotEmpty())
										<img src="{{ asset('storage/' . $product->photos->first()->foto) }}" alt="{{ $product->nama }}">
									@else
										<img src="{{ asset('images/default-product.jpg') }}" alt="Default Product">
									@endif
									<a href="{{ route('home.detail', $product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										Quick View
									</a>
								</div>
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<span 
								class="stext-104 cl4 js-name-b2 p-b-6" 
								style="font-size: 16px; line-height: 19px; font-weight: 500; color: #404040;">
									{{ $product->nama }}
							</span>


							@if ($product->status === 'active' && $product->harga_diskon)
								<span class="stext-105" style="font-size: 16px; font-weight: 500; line-height: 19px; color: #404040;">
									Rp {{ number_format($product->harga_diskon, 0, ',', '.') }}
								</span>
								<span class="stext-105" style="font-size: 14px; line-height: 19px; text-decoration: line-through; color: #E0E0E0;">
									Rp {{ number_format($product->harga, 0, ',', '.') }}
								</span>
							@else
								<span class="stext-105" style="font-size: 16px; font-weight: bold; line-height: 19px; color: #404040;">
									Rp {{ number_format($product->harga, 0, ',', '.') }}
								</span>
							@endif
									</div>
									{{-- <div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
										</a>
									</div> --}}
								</div>
								
							</div>
						</div>
					@endforeach
					<!-- Load more -->
				</div>
				<div class="flex-c-m flex-w w-full p-t-45">
					{{ $products->links() }}
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
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
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
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
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

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
	<script>
		document.addEventListener('DOMContentLoaded', function() {
    // Simpan semua produk saat halaman pertama kali dimuat
    const allProducts = Array.from(document.querySelectorAll('.isotope-item'));

    function getFilterParams() {
        const kategori = document.querySelector('.filter-tope-group .how-active1').getAttribute('data-filter');
        const sort = document.querySelector('.filter-link-active[data-sort]')?.getAttribute('data-sort') || 'default';
        const color = document.querySelector('.filter-link-active[data-color]')?.getAttribute('data-color') || 'all';
        return { kategori, sort, color };
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
            const priceA = parseFloat(a.querySelector('.stext-105').textContent.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));
            const priceB = parseFloat(b.querySelector('.stext-105').textContent.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));
            switch(params.sort) {
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
@if(request()->has('search'))
<script>
	window.addEventListener('load', function () {
		const produkSection = document.getElementById('produk');
		if (produkSection) {
			produkSection.scrollIntoView({ behavior: 'smooth' });
		}
	});
</script>
@endif

</body>
</html>