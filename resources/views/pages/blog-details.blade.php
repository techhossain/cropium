@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">blog details page</h2>

                    <nav class="text-center">
                        <ol class="breadcrumb bg-transparent justify-content-center">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item"><a href="{{route('blog')}}">blog</a></li>
                          <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Details Area Starts -->
    <div class="blog-area blog-details-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="cropium-blog-item">
                        <div class="blog-image">
                            <img src="{{route('home')}}/storage/images/{{$post->feature_image}}" alt="{{$post->title}}">
                            <div class="blog-date">
                                <h5 class="title">{{date('d', strtotime($post->created_at))}}</h5>
                                <span> {{date('F', strtotime($post->created_at))}} </span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="/user/{{ $post->user->username }}"><i class="fa fa-user-o"></i>{{ $post->user->name }}</a></li>
                                    <li><a href="/category/{{$post->category->slug}}"><i class="fa fa-bookmark-o"></i>{{$category->name}}</a></li>
                                    <li><i class="fa fa-calendar"></i>{{date('d, F', strtotime($post->created_at))}}</li>
                                    <li><i class="fa fa-clock-o"></i>{{$post->views}} views</li>
                                </ul>
                            </div>
                            <h3 class="title">{{$post->title}}</h3>
                            <div>
                                {!! $post->content !!}
                            </div>
                        </div>
                    </article>
    
                    <div class="area-separator"></div>
    
                    <!-- Blog Comments Starts -->
                    <div class="blog-comments-area">
                        <div class="comments-title">
                            <h4 class="title">comments</h4>
                        </div>
                        <ul class="comments-list">
                            <li>
                                <div class="single-comment-list">
                                    <div class="list-image">
                                        <img src="/assets/images/comment-1.jpg" alt="author">
                                    </div>
                                    <div class="list-content">
                                        <h5 class="title">john doe</h5>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo reprehenderit id molestiae aspernatur dolorem ex.</p>
                                        <span class="replay-button"><i class="fa fa-reply"></i>replay</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-comment-list">
                                    <div class="list-image">
                                        <img src="/assets/images/comment-2.jpg" alt="author">
                                    </div>
                                    <div class="list-content">
                                        <h5 class="title">devid warner</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure aut numquam perspiciatis iste qui laudantium.</p>
                                        <span class="replay-button"><i class="fa fa-reply"></i>replay</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-comment-list single-comment-list-02">
                                    <div class="list-image">
                                        <img src="/assets/images/comment-3.jpg" alt="author">
                                    </div>
                                    <div class="list-content">
                                        <h5 class="title">jon snow</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id ratione tempore est recusandae commodi.</p>
                                        <span class="replay-button"><i class="fa fa-reply"></i>replay</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
    
                    <div class="area-separator"></div>
    
                    <!-- Blog Comments Form -->
                    <div class="comments-form">
                        <div class="comments-title">
                            <h4 class="title">post comment</h4>
                        </div>
                        <div class="blog-comments-form">
                            <form action="#">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                                <textarea name="message" placeholder="Commente"></textarea>
                                <button type="submit" class="template-btn">submit now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Blog Sidebar Starts -->
                <div class="col-lg-4">
                    <aside class="widget-area sidebar">
                        <div class="widget-search widget-style">

                            <div class="widget-title">
                                <h4 class="title">search</h4>
                            </div>
                            <form method="GET" action="{{route('blog')}}">

                                <input type="text" name="search" placeholder="Search" class="input-shape">
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
        </div>
    </div>






@endsection