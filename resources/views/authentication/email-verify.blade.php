@extends('components.layout')

@section('content')
<!-- Breadcrumb Area Starts -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title">{{$title}}</h2>

                <nav class="text-center">
                    <ol class="breadcrumb bg-transparent justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('login')}}">Login</a></li>
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
            <div class="col-lg-8 offset-lg-2">

                @if( $errors->any())
                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger" role="alert">
                            {{ $err }}
                        </div>
                    @endforeach
                @endif


                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @else
                    <div class="alert alert-secondary" role="alert">
                        <p class="text-warning h4">You must verify your email address</p>
                        <p>If you didn't receive the verifiation link, Click the button to resend verification link!!</p>

                        <form method="post" action="{{route('verification.send')}}">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit">Resend Verification Link</button>
                        </form>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>


@endsection