<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Footer - Ernov Bali</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .luxury-footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #ffffff;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            position: relative;
            overflow: hidden;
        }

        .luxury-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, #d4af37 50%, transparent 100%);
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 40px 0;
        }

        .footer-brand {
            text-align: center;
            margin-bottom: 60px;
        }

        .footer-logo {
            max-width: 200px;
            height: auto;
            filter: brightness(0) invert(1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .footer-logo:hover {
            transform: scale(1.05);
            filter: brightness(0) invert(1) sepia(1) saturate(5) hue-rotate(35deg);
        }

        .footer-tagline {
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #b8b8b8;
            font-weight: 300;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 60px;
            margin-bottom: 60px;
        }

        .footer-section h3 {
            font-size: 18px;
            font-weight: 300;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 30px;
            color: #ffffff;
            position: relative;
            padding-bottom: 15px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 1px;
            background: #d4af37;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 15px;
        }

        .footer-links li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 1px;
            background: #666;
            transition: all 0.3s ease;
        }

        .footer-links li:hover::before {
            background: #d4af37;
            width: 8px;
        }

        .footer-links a,
        .footer-links span {
            color: #b8b8b8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 300;
            line-height: 1.6;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        .hours-info {
            background: rgba(255, 255, 255, 0.02);
            padding: 20px;
            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .hours-info .day {
            font-weight: 400;
            color: #ffffff;
        }

        .hours-info .time {
            color: #d4af37;
            font-weight: 300;
        }

        .address-section {
            margin-bottom: 25px;
        }

        .address-title {
            font-weight: 500;
            color: #d4af37;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .address-text {
            font-size: 13px;
            line-height: 1.6;
            color: #b8b8b8;
            margin-bottom: 8px;
        }

        .social-links {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .social-link {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b8b8b8;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, #d4af37 0%, transparent 70%);
            transition: all 0.3s ease;
            transform: translate(-50%, -50%);
        }

        .social-link:hover {
            color: #ffffff;
            border-color: #d4af37;
            transform: translateY(-2px);
        }

        .social-link:hover::before {
            width: 100%;
            height: 100%;
        }

        .social-link i {
            position: relative;
            z-index: 2;
            font-size: 16px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px 0;
            text-align: center;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .copyright {
            font-size: 12px;
            color: #666;
            letter-spacing: 0.5px;
        }

        .footer-nav {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .footer-nav a {
            color: #b8b8b8;
            text-decoration: none;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: color 0.3s ease;
        }

        .footer-nav a:hover {
            color: #d4af37;
        }

        @media (max-width: 768px) {
            .footer-container {
                padding: 60px 20px 0;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-nav {
                justify-content: center;
            }

            .social-links {
                justify-content: center;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <footer class="luxury-footer">
        <div class="footer-container">
            <!-- Brand Section -->
            <div class="footer-brand animate-fade-in">
                <img src="{{ asset('images/icons/logoernovnewwhite.svg') }}" alt="Ernov Bali" class="footer-logo">
                <p class="footer-tagline">Crafted Excellence Since 2020</p>
            </div>

            <!-- Main Content -->
            <div class="footer-content">
                <!-- Collections -->
                <div class="footer-section animate-fade-in">
                    <h3>Collections</h3>
                    <ul class="footer-links">
                        @foreach ($kategoriFooter as $kategori)
                            <li>
                                <a href="#">{{ $kategori->nama }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Store Hours -->
                <div class="footer-section animate-fade-in">
                    <h3>Store Hours</h3>
                    <div class="hours-info">
                        <div class="footer-links">
                            <li>
                                <span class="day">Monday - Sunday</span><br>
                                <span class="time">9:00 AM - 8:00 PM</span>
                            </li>
                        </div>
                    </div>
                </div>

                <!-- Locations -->
                <div class="footer-section animate-fade-in">
                    <h3>Our Locations</h3>

                    <div class="address-section">
                        <div class="address-title">Factory</div>
                        <div class="address-text">
                            Jalan Mekar Jaya II Blok A12<br>
                            Graha Dewata Pemogan No.1<br>
                            Denpasar Selatan, Bali
                        </div>
                    </div>

                    <div class="address-section">
                        <div class="address-title">Boutiques</div>
                        <div class="address-text">Jl. Kayu Jati No. 3A Seminyak, Bali</div>
                        <div class="address-text">Jl. Kayu Jati No. 4D Seminyak, Bali</div>
                        <div class="address-text">Jl. Batu Belig No.3A Petitenget, Bali</div>
                    </div>
                </div>

                <!-- Connect -->
                <div class="footer-section animate-fade-in">
                    <h3>Connect</h3>
                    <ul class="footer-links">
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">Size Guide</a></li>
                        <li><a href="#">Care Instructions</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                    </ul>

                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/ernovbali" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@ernov_bali" class="social-link">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Ernov Bali. All rights reserved.
                    </div>
                    <nav class="footer-nav">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                        <a href="#">Sitemap</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = `${Math.random() * 0.3}s`;
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.footer-section').forEach(section => {
            observer.observe(section);
        });

        // Social link hover effects
        document.querySelectorAll('.social-link').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 8px 25px rgba(212, 175, 55, 0.3)';
            });

            link.addEventListener('mouseleave', function() {
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>

</html>
