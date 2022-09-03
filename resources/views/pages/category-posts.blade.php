@extends('components.layout')

@section('content')
<!-- Breadcrumb Area Starts -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title">{{$title}}</h2>
                <a href="{{route('home')}}">Home</a><span> / <a href="{{route('category-post', $slug)}}">{{$title}}</a></span>
            </div>
        </div>
    </div>
</section>


<!-- Blog Area Starts -->

<div class="blog-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @foreach($posts as $post)
                <article class="cropium-blog-item">
                    <div class="blog-image">
                        <a href="{{route('single-post', $post->slug)}}">
                            <img src="{{route('home')}}/storage/images/{{$post->feature_image}}" alt="{{$post->title}}">
                        </a>
                        <div class="blog-date">
                            <h5 class="title"> {{date('d', strtotime($post->created_at))}}</h5>
                            <span> {{date('F', strtotime($post->created_at))}} </span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                @if($post->user)
                                <li>
                                    <a href="/user/{{ $post->user->username }}">
                                        <i class="fa fa-user-o"></i>{{ $post->user->name }}
                                    </a>
                                </li>
                                @endif
                                
                                @if($post->category)
                                <li>
                                    <a href="{{route('category-post', $post->category->slug)}}">
                                        <i class="fa fa-bookmark-o"></i>{{$post->category->name}}
                                    </a>
                                </li>
                                @endif
                                <li><i class="fa fa-calendar"></i>{{date('d, F', strtotime($post->created_at))}}</li>
                                <li><i class="fa fa-clock-o"></i>{{$post->views}} views</li>
                            </ul>
                        </div>
                        <h3 class="title">
                            <a href="{{route('single-post', $post->slug)}}">
                                {{$post->id}} . {{$post->title}}
                            </a>
                        </h3>

                        <div>
                            <p>{{$post->excerpt}}</p>
                        </div>
                    </div>
                </article>
                @endforeach

                <!-- Category Pagination Starts -->
            @include('components.pagination')

            </div>

            <!-- Blog Sidebar Starts -->
            <div class="col-lg-4">
                <aside class="widget-area sidebar">
                    <div class="widget-search widget-style">
                        <div class="widget-title">
                            <h4 class="title">search</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Search" class="input-shape">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="widget-recent-post widget-style">
                        <div class="widget-title">
                            <h4 class="title">recent posts</h4>
                        </div>
                        <div class="single-post">
                            <div class="single-post-image">
                                <img src="/assets/images/recent-post-1.jpg" alt="">
                            </div>
                            <div class="single-post-content">
                                <a href="#">about app development</a>
                                <span>14 Oct 2020</span>
                            </div>
                        </div>
                        <div class="single-post">
                            <div class="single-post-image">
                                <img src="/assets/images/recent-post-2.jpg" alt="">
                            </div>
                            <div class="single-post-content">
                                <a href="#">learn SQA</a>
                                <span>14 Oct 2020</span>
                            </div>
                        </div>
                        <div class="single-post">
                            <div class="single-post-image">
                                <img src="/assets/images/recent-post-3.jpg" alt="">
                            </div>
                            <div class="single-post-content">
                                <a href="#">digital marketing tools</a>
                                <span>14 Oct 2020</span>
                            </div>
                        </div>
                    </div>

                    <div class="widget-social-links widget-style">
                        <div class="widget-title">
                            <h4 class="title">Follow us</h4>
                        </div>
                        <ul>
                            <li><a href="#"><span class="facebook-icon"><i class="fa fa-facebook-square"></i></span></a></li>
                            <li><a href="#"><span class="twitter-icon"><i class="fa fa-twitter-square"></i></span></a></li>
                            <li><a href="#"><span class="google-plus-icon"><i class="fa fa-google-plus-square"></i></span></a></li>
                            <li><a href="#"><span class="instagram-icon"><i class="fa fa-instagram"></i></span></a></li>
                        </ul>
                    </div>

                    <div class="widget-categories widget-style">
                        <div class="widget-title">
                            <h4 class="title">categories</h4>
                        </div>
                        <ul>
                            <li><a href="#">creative<span>(11)</span></a></li>
                            <li><a href="#">minimal<span>(02)</span></a></li>
                            <li><a href="#">portfolio<span>(10)</span></a></li>
                            <li><a href="#">modern<span>(09)</span></a></li>
                            <li><a href="#">agency<span>(03)</span></a></li>
                        </ul>
                    </div>
                    <!-- Widget Form Starts -->
                    <div class="widget-form">
                        <div class="request-quote-form">
                            <h4 class="title">request a free quote</h4>
                            <form action="#">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                                <input type="text" placeholder="Phone">
                                <textarea name="message" placeholder="Message"></textarea>
                                <button type="submit">submit request</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>


        <!-- Blog Pagination Starts -->
        <div class="row order-md-1">
            <div class="col-lg-12">

                {{-- {{ $posts->links("vendor.pagination.bootstrap-4") }} --}}

            </div>
        </div>



    </div>
</div>


@endsection