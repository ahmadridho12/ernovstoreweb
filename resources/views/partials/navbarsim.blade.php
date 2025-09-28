<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Fashion Navbar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8f9fa;
            padding-top: 100px;
        }

        /* Modern Navbar Styles */
        .modern-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modern-navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        /* Left Menu */
        .nav-left {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            flex: 1;
        }

        /* Center Logo */
        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .brand-logo {
            font-size: 2rem;
            font-weight: 300;
            color: #1a1a1a;
            text-decoration: none;
            letter-spacing: 8px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
        }

        .brand-logo::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, #d4af37, #ffd700);
            transition: width 0.3s ease;
        }

        .brand-logo:hover::after {
            width: 100%;
        }

        .brand-tagline {
            font-size: 0.65rem;
            color: #888;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 400;
        }

        /* Right Menu */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            flex: 1;
            justify-content: flex-end;
        }

        /* Menu Items */
        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 400;
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            position: relative;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #d4af37;
            transition: width 0.3s ease;
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            width: 100%;
        }

        .nav-link:hover {
            color: #d4af37;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            min-width: 200px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 10px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown:hover .dropdown-content {
            opacity: 1;
            visibility: visible;
            margin-top: 0;
        }

        .dropdown-content a {
            display: block;
            padding: 12px 20px;
            color: #1a1a1a;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown-content a:last-child {
            border-bottom: none;
            border-radius: 0 0 8px 8px;
        }

        .dropdown-content a:first-child {
            border-radius: 8px 8px 0 0;
        }

        .dropdown-content a:hover {
            background: #f8f9fa;
            color: #d4af37;
            padding-left: 25px;
        }

        /* Icons */
        .nav-icons {
            display: flex;
            gap: 1rem;
        }

        .nav-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: transparent;
            border: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a1a1a;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .nav-icon:hover {
            background: #d4af37;
            color: white;
            border-color: #d4af37;
            transform: translateY(-2px);
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
        }

        .mobile-toggle span {
            width: 25px;
            height: 2px;
            background: #1a1a1a;
            transition: all 0.3s ease;
        }

        /* Mobile Styles */
        @media (max-width: 1024px) {

            .nav-left,
            .nav-right {
                display: none;
            }

            .mobile-toggle {
                display: flex;
            }

            .navbar-container {
                padding: 0 1rem;
            }

            .brand-logo {
                font-size: 1.5rem;
                letter-spacing: 6px;
            }
        }

        /* Demo Content */
        .demo-content {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .demo-content h1 {
            font-size: 3rem;
            color: #1a1a1a;
            margin-bottom: 1rem;
            font-weight: 300;
        }

        .demo-content p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.6;
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            background: white;
            position: fixed;
            top: 80px;
            /* sesuai tinggi navbar */
            left: 0;
            width: 100%;
            height: calc(100% - 80px);
            padding: 1rem;
            overflow-y: auto;
            z-index: 999;
        }

        .mobile-menu.active {
            display: flex;
        }

        .mobile-menu a,
        .mobile-dropdown-toggle {
            padding: 12px;
            font-size: 1rem;
            color: #1a1a1a;
            text-decoration: none;
            border-bottom: 1px solid #eee;
            text-align: left;
            background: none;
            width: 100%;
            cursor: pointer;
        }

        .mobile-dropdown {
            display: flex;
            flex-direction: column;
        }

        .mobile-dropdown-content {
            display: none;
            flex-direction: column;
            padding-left: 1rem;
            background: #f9f9f9;
        }

        .mobile-dropdown.active .mobile-dropdown-content {
            display: flex;
        }
    </style>
</head>

<body>
    <!-- Modern Navbar -->
    <nav class="modern-navbar" id="navbar">
        <div class="navbar-container">
            <!-- Left Navigation -->
            <div class="nav-left">
                <div class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="{{ route('home.productss') }}"
                        class="nav-link {{ Request::is('products*') ? 'active' : '' }}">Products</a>
                    <div class="dropdown-content">
                        <a href="#">New Arrivals</a>
                        <a href="#">Women</a>
                        <a href="#">Men</a>
                        <a href="#">Accessories</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#"
                        class="nav-link
                    {{ Request::is('about') || Request::is('order') || Request::is('shippinginfo') || Request::is('faq')
                        ? 'active'
                        : '' }}">
                        About
                    </a>
                    <div class="dropdown-content">
                        <a href="{{ url('/about') }}">About Us</a>
                        <a href="{{ route('home.order') }}">How to Order</a>
                        <a href="{{ route('home.shippinginfo') }}">Shipping Info</a>
                        <a href="{{ route('home.faq') }}">FAQ</a>
                    </div>
                </div>
            </div>

            <!-- Center Logo -->
            <div class="nav-center">
                <a href="{{ url('/') }}" class="brand-logo">ERNOV</a>
                <div class="brand-tagline">Bali</div>
            </div>

            <!-- Right Navigation -->
            <div class="nav-right">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link">Marketplace</a>
                    <div class="dropdown-content">
                        <a href="https://www.tokopedia.com/ernov" target="_blank">Tokopedia</a>
                        <a href="https://shopee.co.id/ernovbali" target="_blank">Shopee</a>
                        <a href="https://www.lazada.co.id/shop/ernov-bali" target="_blank">Lazada</a>
                        <a href="https://www.blibli.com/merchant/ernov-bali/ERB-70014" target="_blank">Blibli</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="{{ route('sample_colors.user_index') }}"
                        class="nav-link {{ Request::is('sample-colors*') ? 'active' : '' }}">Sample Color</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('home.contact') }}"
                        class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <div class="nav-item search-item">
                    <a href="#" class="nav-link js-show-modal-search">
                        <i class="zmdi zmdi-search" style="font-size:24px;"></i>
                    </a>
                </div>
            </div>

            <!-- Mobile Toggle -->
            <div class="mobile-toggle" id="mobileToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="{{ route('home.productss') }}" {{-- pastikan ini sesuai nama route kamu --}}
                method="GET">
                <button type="submit" class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search..."
                    value="{{ request('search') }}">
            </form>

        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('home.productss') }}">Products</a>

        <!-- Mobile About Dropdown -->
        <div class="mobile-dropdown">
            <button class="mobile-dropdown-toggle">About ▾</button>
            <div class="mobile-dropdown-content">
                <a href="{{ url('/about') }}">About Us</a>
                <a href="{{ route('home.order') }}">How to Order</a>
                <a href="{{ route('home.shippinginfo') }}">Shipping Info</a>
                <a href="{{ route('home.faq') }}">FAQ</a>
            </div>
        </div>

        <!-- Mobile Marketplace Dropdown -->
        <div class="mobile-dropdown">
            <button class="mobile-dropdown-toggle">Marketplace ▾</button>
            <div class="mobile-dropdown-content">
                <a href="https://www.tokopedia.com/ernov" target="_blank">Tokopedia</a>
                <a href="https://shopee.co.id/ernovbali" target="_blank">Shopee</a>
                <a href="https://www.lazada.co.id/shop/ernov-bali" target="_blank">Lazada</a>
                <a href="https://www.blibli.com/merchant/ernov-bali/ERB-70014" target="_blank">Blibli</a>
            </div>
        </div>

        <a href="{{ route('sample_colors.user_index') }}">Sample Color</a>
        <a href="{{ route('home.contact') }}">Contact</a>
    </div>

    <!-- Demo Content -->

    <!-- Additional demo content for scrolling -->

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu functionality
        const mobileToggle = document.getElementById('mobileToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileToggle.addEventListener('click', function() {
            mobileToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        });

        // Mobile dropdown functionality
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const parent = this.parentElement;
                parent.classList.toggle('active');
            });
        });

        // Close menu if resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024) {
                mobileToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    </script>

</body>

</html>
