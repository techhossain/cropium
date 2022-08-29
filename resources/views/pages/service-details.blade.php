@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">service details page</h2>
                    <a href="#">home</a><span> / service details page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Area Starts -->
    <div class="service-details-area padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="service-detail">
                        <div class="serviec-image">
                            <img src="/assets/images/service-details-image.jpg" alt="">
                        </div>
                        <div class="service-content">
                            <h3 class="title">digital marketing</h3>
                            <p class="margin-top-20">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias quos reiciendis molestiae pariatur eius voluptatibus voluptate quo aliquam accusantium voluptates quia necessitatibus eaque, deleniti consequatur!.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem error perferendis excepturi possimus iusto libero nobis modi mollitia fuga ea.</p>
                            <ul>
                                <li><i class="fa fa-circle"></i>Pariatur eius voluptatibus volate</li>
                                <li><i class="fa fa-circle"></i>Numquid aliquo tibi Et dicit quod videt te.</li>
                                <li><i class="fa fa-circle"></i>Vos ite post eum, fistulae, nunquam vivum.</li>
                                <li><i class="fa fa-circle"></i>Mike suspectas habere possunt, sed quod.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 offset-xl-1 col-lg-5">
                    <div class="service-widget-area">
                        <div class="widget-nav-menu">
                            <ul>
                                <li>
                                    <a href="#" class="service-widget">IT consulting</a>
                                </li>
                                <li>
                                    <a href="#" class="service-widget">data analystics</a>
                                </li>
                                <li>
                                    <a href="#" class="service-widget">software research</a>
                                </li>
                                <li>
                                    <a href="#" class="service-widget">business consulting</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-button-area">
                            <ul>
                                <li>
                                    <a href="#" class="button-widget">
                                        <span>dowunload .docs broucher</span>
                                        <span class="button-icon"><i class="fa fa-file-word-o"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="button-widget">
                                        <span>dowunload .pdf broucher</span>
                                        <span class="button-icon"><i class="fa fa-file-pdf-o"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Area Starts -->
    @include('components.home.client-area')

    <!-- Social Link Area Starts -->
    @include('components.home.social')

@endsection