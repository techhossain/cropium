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
                          <li class="breadcrumb-item"><a href="{{route('customer.register')}}">Register</a></li>
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

                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                  @endif


                <h2 class="text-center">Register as a Customer</h2>
                <hr>
              <form method="post" action="{{route('customer.processRegistration')}}" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                      <label for="name" class="form-label">Full Name</label>
                      <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name">
                      <small class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                      </small>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input value="{{old('username')}}" type="text" class="form-control" id="username" name="username">
                        <small class="text-danger">
                            @error('username')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                      
                    <div class="mb-3">
                        <label for="photo" class="form-label">Upload Photo</label>
                        <input value="{{old('photo')}}" type="file" class="form-control" id="photo" name="photo">
                        <small class="text-danger">
                            @error('photo')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input value="{{old('email')}}" type="email" class="form-control" id="email" name="email">
                        <small class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      <small class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </small>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Register">
                  </form> 
                </div>
        </div>
    </div>
</div>


@endsection

