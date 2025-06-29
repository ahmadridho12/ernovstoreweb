<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
 <style>
	body {
    padding-top: 0px; /* Sesuaikan dengan tinggi navbar */
}

	/* Contoh CSS custom */
	.category-banner {
    /* margin: 0 10%; 80px margin di kiri dan kanan pada layar lebar */
    position: relative;
    overflow: hidden;
}

.category-banner img {
    width: 100%;
    height: auto;
    max-width: 100%;
    object-fit: cover;
    object-position: center;
}

.category-banner h3 {
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    text-align: center;
    color: white;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.5); /* Optional: untuk membuat teks lebih terbaca */
}

/* Responsif untuk layar yang lebih kecil */
@media (max-width: 768px) {
    .category-banner {
        margin: 0 5%; /* Kurangi margin pada layar kecil */
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
	.filter-col2 ul {
  display: flex;
  flex-direction: column;
  gap: 8px; /* jarak antar item */
}
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
</style>
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('partials.navbartwo')
	{{-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('bag.png') }}');"> --}}
		<br><br><br>
	</section>		
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

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form 
						action="{{ route('home.productss') }}" 
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
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row product-container">
					@foreach($products as $product)
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ strtolower($product->kategori->nama) }}"
							 data-color="{{ $product->color }}">
							<!-- Block2 produk -->
							<div class="block2-pic hov-img0">
								@if($product->photos->isNotEmpty())
									<img src="{{ asset($product->photos->first()->foto) }}" alt="{{ $product->nama }}">
								@else
									<img src="{{ asset('images/default-product.jpg') }}" alt="Default Product">
								@endif

								{{-- <a href="{{ route('home.detail', $product->id_produk) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View
								</a> --}}
								<a href="{{ route('home.detail', $product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View
								</a>
							</div>
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
							<span 
								class="stext-104 cl4 js-name-b2 p-b-6" 
								style="font-size: 16px; line-height: 19px; font-weight: 500; color:#404040;">
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

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#"
										class="js-share-b2 fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
										data-tooltip="Share"
										data-url="{{ route('home.detail', $product->id_produk) }}"
										data-title="{{ $product->nama }}"
										data-text="Lihat produk keren ini: {{ $product->nama }}">
									   <img src="{{ asset('images/icons/share.png') }}"
											alt="Share"
											style="width:24px; height:24px;">
									 </a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					<!-- Load more -->
					<!-- Pagination -->
					
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
<script>
	document.addEventListener('DOMContentLoaded', () => {
	  document.querySelectorAll('.js-share-b2').forEach(btn => {
		btn.addEventListener('click', async e => {
		  e.preventDefault();
		  const url   = btn.dataset.url;
		  const title = btn.dataset.title || document.title;
		  const text  = btn.dataset.text || '';
  
		  if (navigator.share) {
			try {
			  await navigator.share({ title, text, url });
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
	});
  </script>

</body>
</html>