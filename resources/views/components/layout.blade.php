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

<body>
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
    <header class="header-area">
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
                                    <li class="current-menu-item">
                                        <a href="{{route('home')}}">home</a>
                                    </li>
                                    <li class="no-children">
                                        <a href="{{url('/about')}}">about</a>
                                    </li>
                                    <li class="no-children">
                                        <a href="{{url('/blog')}}">blog</a>
                                    </li>
                                    <li class="no-children">
                                        <a href="{{url('/contact')}}">contact</a>
                                    </li>

                                    @guest
                                    <li class="no-children">
                                        <a href="{{url('/register')}}">Register</a>
                                    </li>
                                    <li class="no-children">
                                        <a href="{{url('/login')}}">Login</a>
                                    </li>
                                    @endguest

                                    @auth
                                    <li class="no-children">
                                        <a href="{{url('/dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="no-children">
                                        <form method="post" action="{{route('logout')}}">
                                            @csrf
                                            <input type="submit" class="btn btn-link text-light px-0" value="Logout">
                                        </form>
                                    </li>
                                    @endauth
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



    
    <!-- Call To Action Area Starts -->
    <section class="call-to-action">
        <div class="container">
            <div class="call-to-action-bg">
                <div class="call-to-action-shape">
                    <img src="/assets/images/award-shape.png" alt="">
                </div>
                <div class="call-to-action-content">
                    <div class="call-to-action-title">
                        <h2 class="title">if you have any question feel free to call <span>120-2587863</span></h2>
                        <div class="margin-top-40">
                            <h6 class="title">It is a long established fact that <a href="#">sujonkhan@gmail.com</a> content of a page.</h6>
                        </div>
                    </div>
                    <div class="call-to-action-btn">
                        <a href="#" class="template-btn action-btn">get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo">
                            <a href="#"><img src="/assets/images/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="/">home</a></li>
                                <li><a href="about">about</a></li>
                                <li><a href="contact">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <span>&copy; 2020, Cropium. All Rights Reserved.</span>
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