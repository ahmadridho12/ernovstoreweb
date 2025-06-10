<footer class="bg3 p-t-75 p-b-32">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <div class="container">
        <div class="row">
              <div class="col-sm-6 col-lg-3 p-b-50">
                <img src="{{ asset('images/icons/ernov-logo.png') }}" alt="Ernov Logo" style="max-width: 150px;">
                <p class="stext-107 cl7 p-t-20">Your trusted leather goods partner.</p>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Categories
                </h4>
            
                <ul>
                    @foreach($kategoriFooter as $kategori)
                        <li class="p-b-10">
                            <span class="stext-107 cl7 hov-cl1 trans-04">
                                {{ $kategori->nama }}
                            </span>
                        </li>
                    @endforeach
                </ul>
                
            </div>
            

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Open Hours
                </h4>

                <ul>
                    <li class="p-b-10">
                        <span class="stext-107 cl7 hov-cl1 trans-04">
                            Everyday <br>
                            <span class="block">9:00 am – 8:00 pm</span>
                        </span>
                        
                        
                    </li>

                    
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    ADDRESS
                </h4>

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
                
                

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

            {{-- <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Newsletter
                </h4>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div> --}}
        </div>

        <div class="p-t-40">
            {{-- <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                </a>
            </div> --}}

            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with  by Ernov Bali
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
    </div>
</footer>