<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Fashion Navbar - KIVEE Style</title>
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
            overflow-x: hidden;
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
            height: 80px;
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

        /* Hamburger Menu */
        .hamburger-menu {
            display: flex;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
            padding: 10px;
            z-index: 1001;
            transition: all 0.3s ease;
        }

        .hamburger-line {
            width: 25px;
            height: 2px;
            background: #1a1a1a;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        .hamburger-menu.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .hamburger-menu.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-menu.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* Center Logo */
        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .brand-logo {
            font-size: 1.8rem;
            font-weight: 400;
            color: #1a1a1a;
            text-decoration: none;
            letter-spacing: 4px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .brand-tagline {
            font-size: 1rem;
            color: #888;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 400;
        }

        .brand-logo:hover {
            color: #d4af37;
        }

        /* Right Icons */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a1a1a;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            cursor: pointer;
        }

        .nav-icon:hover {
            color: #d4af37;
            transform: translateY(-1px);
        }

        /* Fullscreen Overlay Menu */
        .fullscreen-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 75%;
            background: white;
            z-index: 999;
            display: flex;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.15);
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .fullscreen-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Remove backdrop as we don't need it for top menu */
        .menu-backdrop {
            display: none;
        }

        .menu-section {
            flex: 1;
            padding: 120px 60px 60px;
            display: flex;
            flex-direction: column;
        }

        .menu-section h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a1a1a;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .menu-item {
            display: block;
            color: #333;
            text-decoration: none;
            font-size: 1rem;
            padding: 12px 0;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .menu-item:hover {
            color: #d4af37;
            padding-left: 10px;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        /* Close Button */
        .close-menu {
            position: absolute;
            top: 25px;
            right: 40px;
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
            z-index: 1001;
            transition: all 0.3s ease;
        }

        .close-menu:hover {
            color: #1a1a1a;
            transform: rotate(90deg);
        }

        /* Search Modal - Original Style */
        .modal-search-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1002;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-search-header.show-modal-search {
            opacity: 1;
            visibility: visible;
        }

        .container-search-header {
            background: white;
            padding: 3rem;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            position: relative;
        }

        .btn-hide-modal-search {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .btn-hide-modal-search img {
            width: 20px;
            height: 20px;
        }

        .wrap-search-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 2px solid #eee;
            border-radius: 8px;
            padding: 15px 20px;
            transition: border-color 0.3s ease;
        }

        .wrap-search-header:focus-within {
            border-color: #d4af37;
        }

        .wrap-search-header button[type="submit"] {
            background: none;
            border: none;
            color: #666;
            font-size: 1.1rem;
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 5px;
        }

        .wrap-search-header button[type="submit"]:hover {
            color: #d4af37;
        }

        .plh3 {
            flex: 1;
            border: none;
            outline: none;
            font-size: 1.1rem;
            color: #333;
            padding: 0;
        }

        .plh3::placeholder {
            color: #999;
        }

        .flex-c-m {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flex-w {
            display: flex;
            flex-wrap: wrap;
        }

        .p-l-15 {
            padding-left: 15px;
        }

        .trans-04 {
            transition: all 0.4s;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .navbar-container {
                padding: 0 1rem;
            }

            .brand-logo {
                font-size: 1.7rem;
                letter-spacing: 2px;
            }

            .brand-tagline {
                font-size: 0.9rem;
                letter-spacing: 1px;
            }

            .nav-right {
                gap: 0.3rem;
            }

            .nav-icon {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }

            .hamburger-menu {
                padding: 3px;
                gap: 3px;
            }

            .hamburger-line {
                width: 18px;
                height: 1.5px;
            }

            .menu-section {
                padding: 90px 15px 20px;
                flex: none;
                width: 100%;
            }

            .fullscreen-menu {
                flex-direction: column;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }

            .menu-section h3 {
                font-size: 0.85rem;
                margin-bottom: 0.8rem;
                padding-bottom: 0.4rem;
            }

            .menu-item {
                font-size: 0.85rem;
                padding: 6px 0;
            }

            .close-menu {
                top: 15px;
                right: 15px;
                font-size: 1.2rem;
            }

            .container-search-header {
                padding: 1.5rem 1rem;
                margin: 0 1rem;
                width: calc(100% - 2rem);
            }

            .wrap-search-header {
                padding: 10px 12px;
            }

            .plh3 {
                font-size: 0.9rem;
            }

            .fullscreen-menu {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .fullscreen-menu {
                width: 100%;
            }

            .menu-section {
                padding: 16px 12px 15px;
                margin-bottom: 20px;
                /* jarak antar section */
            }

            /* kasih jarak ekstra hanya di section pertama */
            .menu-section:first-child {
                padding-top: 60px;
            }

            .menu-section h3 {
                font-size: 0.8rem;
                margin-bottom: 0.6rem;
            }

            .menu-item {
                font-size: 0.8rem;
                padding: 5px 0;
            }

            .container-search-header {
                padding: 1.2rem 0.8rem;
            }

            .wrap-search-header {
                padding: 8px 10px;
            }

            .plh3 {
                font-size: 0.85rem;
            }
        }

        /* Demo Content */
        .demo-content {
            padding: 120px 2rem 4rem;
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
            margin-bottom: 2rem;
        }

        .demo-section {
            padding: 4rem 0;
            border-bottom: 1px solid #eee;
        }

        .demo-section:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <!-- Modern Navbar -->
    <nav class="modern-navbar" id="navbar">
        <div class="navbar-container">
            <!-- Hamburger Menu -->
            <div class="hamburger-menu" id="hamburgerMenu">
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
            </div>

            <!-- Center Logo -->
            <div class="nav-center">
                <a href="{{ url('/') }}" class="brand-logo">ERNOV</a>
                <div class="brand-tagline">Bali</div>
            </div>

            <!-- Right Icons -->
            <div class="nav-right">
                <div class="nav-icon js-show-modal-search">
                    <i class="fas fa-search"></i>
                </div>

            </div>
        </div>
    </nav>

    <!-- Menu Backdrop -->
    <div class="menu-backdrop" id="menuBackdrop"></div>

    <!-- Fullscreen Menu Overlay -->
    <div class="fullscreen-menu" id="fullscreenMenu">
        <div class="close-menu" id="closeMenu">×</div>

        <!-- Shop Section -->
        <div class="menu-section">
            <h3>SHOP</h3>
            <a href="{{ url('/') }}" class="menu-item">Home</a>
            <a href="{{ route('home.productss') }}" class="menu-item">New Arrivals</a>
            <a href="{{ route('home.productss') }}" class="menu-item">Women</a>
            <a href="{{ route('home.productss') }}" class="menu-item">Men</a>
            <a href="{{ route('home.productss') }}" class="menu-item">Accessories</a>
            <a href="{{ route('home.productss') }}" class="menu-item">Shop All</a>
        </div>

        <!-- Categories Section -->
        <div class="menu-section">
            <h3>CATEGORIES</h3>
            <a href="{{ route('home.productss') }}" class="menu-item">All Products</a>
            @foreach ($kategoriFooter as $kategori)
                <a href="{{ route('home.productss', ['category' => $kategori->slug ?? $kategori->id]) }}"
                    class="menu-item">{{ $kategori->nama }}</a>
            @endforeach
        </div>

        <!-- About Section -->
        <div class="menu-section">
            <h3>ABOUT</h3>
            <a href="{{ url('/about') }}" class="menu-item">About Us</a>
            <a href="{{ route('home.order') }}" class="menu-item">How to Order</a>
            <a href="{{ route('home.shippinginfo') }}" class="menu-item">Shipping Info</a>
            <a href="{{ route('home.faq') }}" class="menu-item">FAQ</a>
        </div>

        <!-- Others Section -->
        <div class="menu-section">
            <h3>MORE</h3>
            <a href="{{ route('sample_colors.user_index') }}" class="menu-item">Sample Color</a>
            <a href="{{ route('home.contact') }}" class="menu-item">Contact</a>
            <a href="https://www.tokopedia.com/ernov" target="_blank" class="menu-item">Tokopedia</a>
            <a href="https://shopee.co.id/ernovbali" target="_blank" class="menu-item">Shopee</a>
            <a href="https://www.lazada.co.id/shop/ernov-bali" target="_blank" class="menu-item">Lazada</a>
            <a href="https://www.blibli.com/merchant/ernov-bali/ERB-70014" target="_blank" class="menu-item">Blibli</a>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="{{ route('home.productss') }}" method="GET">
                <button type="submit" class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>



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

        // Hamburger menu functionality
        const hamburgerMenu = document.getElementById('hamburgerMenu');
        const fullscreenMenu = document.getElementById('fullscreenMenu');
        const closeMenu = document.getElementById('closeMenu');

        function toggleMenu() {
            hamburgerMenu.classList.toggle('active');
            fullscreenMenu.classList.toggle('active');
            // Don't prevent body scrolling - allow scrolling behind the menu
        }

        hamburgerMenu.addEventListener('click', toggleMenu);
        closeMenu.addEventListener('click', toggleMenu);

        // Close menu when clicking outside menu area (the bottom 25% of screen)
        document.addEventListener('click', function(e) {
            if (fullscreenMenu.classList.contains('active') &&
                !fullscreenMenu.contains(e.target) &&
                !hamburgerMenu.contains(e.target)) {
                toggleMenu();
            }
        });

        // Search modal functionality - Original Style
        const searchIcons = document.querySelectorAll('.js-show-modal-search');
        const searchModal = document.querySelector('.js-hide-modal-search');
        const closeSearchBtns = document.querySelectorAll('.js-hide-modal-search');

        // Show search modal
        searchIcons.forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                searchModal.classList.add('show-modal-search');
                document.body.style.overflow = 'hidden';

                // Focus on input after modal shows
                setTimeout(() => {
                    const searchInput = searchModal.querySelector('.plh3');
                    if (searchInput) searchInput.focus();
                }, 100);
            });
        });

        // Hide search modal
        closeSearchBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (e.target.closest('.container-search-header') && !e.target.closest(
                        '.btn-hide-modal-search')) {
                    return; // Don't close if clicking inside container but not close button
                }
                searchModal.classList.remove('show-modal-search');
                document.body.style.overflow = '';
            });
        });

        // Close menus on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                hamburgerMenu.classList.remove('active');
                fullscreenMenu.classList.remove('active');
                searchModal.classList.remove('show-modal-search');
                document.body.style.overflow = '';
            }
        });

        // ESC key to close modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (fullscreenMenu.classList.contains('active')) {
                    toggleMenu();
                }
                if (searchModal.classList.contains('show-modal-search')) {
                    searchModal.classList.remove('show-modal-search');
                    document.body.style.overflow = '';
                }
            }
        });
    </script>

</body>

</html>
