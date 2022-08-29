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

                @if(session('invalidPassword'))
                    <div class="alert alert-danger" role="alert">
                        {{session('invalidPassword')}}
                    </div>
                @endif

                <h2 class="text-center">Login</h2>
                <hr>


                <form method="post" action="{{route('processLogin')}}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input value="{{old('email')}}" type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input value="" type="password" class="form-control" id="password" name="password">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Login">
                  </form>

            </div>
        </div>
    </div>
</div>


@endsection
