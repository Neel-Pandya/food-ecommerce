<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>Food Ecommerce
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ URL::to('/') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ URL::to('/') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/glightbox/css/glightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="{{ URL::to('/') }}/" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                {{-- <img src="" alt=""> --}}
                <h1>Yummy<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ URL::to('/') }}/#hero">Home</a></li>

                    <li><a href="{{ URL::to('/') }}/#menu">Menu</a></li>
                    <li><a href="{{ URL::to('/') }}/#chefs">Chefs</a></li>
                    <li><a href="{{ URL::to('/') }}/#gallery">Gallery</a></li>

                    <li><a href="{{ URL::to('/') }}/#contact">Contact</a></li>
                    @if(session()->has('user_email') and session()->has('user_password'))
                    <li><a href="{{ route('user.cart') }}"
                            class="{{ request()->routeIs('user.cart') ? 'active' : ''}}">Cart</a></li>
                    <li><a href="{{ route('user.edit.profile') }}"
                            class="{{ request()->routeIs('user.edit.profile')  ? 'active' : ''}}">Profile</a></li>

                    <li><a href="{{ route('user.purchase.item') }}"
                            class="{{ request()->routeIs('user.purchase.item')  ? 'active' : ''}}">Purchased Item</a>
                    </li>
                    <li><a href="{{ route('user.change.password') }}"
                            class="{{ request()->routeIs('user.change.password') ? 'active' : '' }}">Change
                            Password</a></li>
                    @endif

                </ul>
            </nav><!-- .navbar -->
            @if (session()->has('user_email') and session()->has('user_password'))
            <a href="{{ route('user.logout') }}" class="btn-book-a-table">Logout</a>
            @else
            <a class="btn-book-a-table" href="{{ route('guest.login') }}">Login</a>
            @endif
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    @yield('content')

    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022 - US<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                            <strong>Phone:</strong> +91 9081065019<br>
                            <strong>Email:</strong> meet@gmail.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Meet Gangadiya</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">Meet</a>
            </div>
        </div>

    </footer>

    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendors/glightbox/js/glightbox.js') }}"></script>
    <script src="{{ asset('assets/vendors/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/php-email-form/validate.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="{{ asset('js/sweetAlert.js') }}"></script>

    @yield('scripts')


</body>

</html>