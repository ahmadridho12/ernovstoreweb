<header>
    <!-- Link ke CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.navbar-scroll');
        window.addEventListener('scroll', function () {
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>

    <!-- Header desktop -->
<div class="container-menu-desktop navbar-scroll">
    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">
            <a href="#" class="logo">
                <img src="{{ asset('images/icons/ernovv.svg') }}" alt="IMG-LOGO">
            </a>

            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="{{ request()->is('/') ? 'active-menu' : '' }}">
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="label1 {{ request()->routeIs('home.productss') ? 'active-menu' : '' }}" data-label1="hot">
                        <a href="{{ route('home.productss') }}">Product</a>
                    </li>

                    <li class="{{ request()->is('about') || request()->routeIs('home.order', 'home.shippinginfo', 'home.faq') ? 'active-menu' : '' }}">
                        <a href="#">About</a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ route('home.order') }}">How to Order</a></li>
                            <li><a href="{{ route('home.shippinginfo') }}">Shipping Information</a></li>
                            <li><a href="{{ route('home.faq') }}">FAQ</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#">MarketPlace</a>
                        <ul class="sub-menu">
                            <li><a href="https://www.tokopedia.com/ernov" target="_blank" rel="noopener noreferrer">Tokopedia</a></li>
                            <li><a href="https://shopee.co.id/ernovbali" target="_blank" rel="noopener noreferrer">Shopee</a></li>
                            <li><a href="https://www.lazada.co.id/shop/ernov-bali" target="_blank" rel="noopener noreferrer">Lazada</a></li>
                            <li><a href="https://www.blibli.com/merchant/ernov-bali/ERB-70014" target="_blank" rel="noopener noreferrer">Blibli</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="https://www.ernov-bali.com/home/sample_color" target="_blank" rel="noopener noreferrer">Sample Color</a>
                    </li>

                    <li class="{{ request()->routeIs('home.contact') ? 'active-menu' : '' }}">
                        <a href="{{ route('home.contact') }}">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="wrap-icon-header flex-w flex-r-m">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>
        </nav>
    </div>
</div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <div class="logo-mobile">
            <a href="{{ url('/') }}"><img src="{{ asset('images/icons/ernovv.svg') }}" alt="IMG-LOGO"></a>
        </div>
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
            
        </div>
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('home.productss') }}">Shop</a></li>
            <li >
                <a href="#">About</a>
                <ul class="sub-menu-m">
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{route('home.order')}}">How to Order</a></li>
                    <li><a href="{{ route('home.shippinginfo')}}">Shipping Information</a></li>
                    <li><a href="{{ route('home.faq')}}">FAQ</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            <li >
                <a href="#">MarketPlace</a>
                <ul class="sub-menu-m">
                    <li>
                        <a 
                          href="https://www.tokopedia.com/ernov" 
                          target="_blank" 
                          rel="noopener noreferrer"
                        >
                          Tokopedia
                        </a>
                      </li>
                      <li>
                        <a 
                          href="https://shopee.co.id/ernovbali" 
                          target="_blank" 
                          rel="noopener noreferrer"
                        >
                          Shopee
                        </a>
                      </li>
                      <li>
                        <a 
                          href="https://www.lazada.co.id/shop/ernov-bali" 
                          target="_blank" 
                          rel="noopener noreferrer"
                        >
                          Lazada
                        </a>
                      </li>
                      <li>
                        <a 
                          href="https://www.blibli.com/merchant/ernov-bali/ERB-70014" 
                          target="_blank" 
                          rel="noopener noreferrer"
                        >
                          Blibli
                        </a>
                      </li>
                    </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
           
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </div>
    
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>
    
            <form 
    class="wrap-search-header flex-w p-l-15"
    action="{{ route('home.productss') }}"   {{-- pastikan ini sesuai nama route kamu --}}
    method="GET"
>
    <button type="submit" class="flex-c-m trans-04">
        <i class="zmdi zmdi-search"></i>
    </button>
    <input 
        class="plh3" 
        type="text" 
        name="search" 
        placeholder="Search..."
        value="{{ request('search') }}"
    >
</form>

        </div>
    </div>
    
</header>
