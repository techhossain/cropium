<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Cropium Portfolio Template</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <!-- CSS StyleSheet -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="home-page-2">
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
              </div>
        </div>
    </div>

    <!-- Header Area Starts -->
    <header class="header-area header-home-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Navbar Starts -->
                    <nav class="navbar navbar-area navbar-expand-lg nav-style-02 nav-absolute">
                        <div class="container nav-container">
                            <div class="responsive-mobile-menu">
                                <div class="logo-wrapper">
                                    <a href="/" class="logo">
                                        <img src="/assets/images/logo.png" alt="logo">
                                    </a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cropium-main-menu" 
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggle-icon"></span>
                                    <span class="toggle-icon"></span>
                                    <span class="toggle-icon"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="cropium-main-menu">
                                <ul class="navbar-nav">
                                    <li class="menu-item-has-children current-menu-item">
                                        <a href="#">home</a>
                                        <ul class="sub-menu">
                                            <li><a href="/">home 01</a></li>
                                            <li><a href="home-2">home 02</a></li>
                                        </ul>
                                    </li>
                                    <li class="no-children">
                                        <a href="about">about</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog">blog</a></li>
                                            <li><a href="blog-details">blog details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="service">service</a></li>
                                            <li><a href="service-details">service details</a></li>
                                            <li><a href="portfolio">portfolio</a></li>
                                            <li><a href="portfolio-details">portfolio details</a></li>
                                            <li><a href="404">404</a></li>
                                        </ul>
                                    </li>
                                    <li class="no-children">
                                        <a href="contact">contact</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Nav Right Content Starts -->
                            <div class="nav-right-content">
                                <a href="#" class="header-language active">en</a>
                                <a href="#" class="header-language">bn</a>
                                <a href="#" class="template-btn header-btn">hire me</a>
                            </div>
                            <!-- Nav Right Content End -->
                        </div>
                    </nav>
                    <!-- Navbar End -->
                </div>
            </div>
        </div>
    </header>


    @yield('content')



    
    <!-- Footer Area Starts -->
    <footer class="footer-area-home-2">
        <div class="footer-widget-area padding-top-80 padding-bottom-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/"><img src="/assets/images/logo.png" alt="logo"></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet exercitationem sapiente nostrum.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h4 class="title">our services</h4>
                            </div>
                            <ul>
                                <li><a href="#">web page design</a></li>
                                <li><a href="#">IOS aplication</a></li>
                                <li><a href="#">UX research</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h4 class="title">useful links</h4>
                            </div>
                            <ul>
                                <li><a href="#">our blog</a></li>
                                <li><a href="#">case study</a></li>
                                <li><a href="#">legal info</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h4 class="title">Subscribe Us</h4>
                            </div>
                            <form action="#">
                                <input type="email" placeholder="Email" class="input-shape">
                                <button type="submit"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-home-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span>&copy; Cropium 2020. All Rights Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Javascript -->
    <script src="/assets/js/jquery-2.2.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <script src="/assets/js/easing.min.js"></script>
    <script src="/assets/js/circle-progressbar.min.js"></script>
    <script src="/assets/js/isotop.min.js"></script>
    <script src="/assets/js/counterup.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>