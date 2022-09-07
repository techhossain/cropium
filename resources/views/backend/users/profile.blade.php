@extends('backend.admin.layout')

  @section('content')

      <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                      @if(session('message')) 
                        <div class="alert alert-success" role="alert">
                          {{session('message')}}
                        </div>
                      @endif

                  <h4 class="card-title">Update Profile</h4>

                  <form class="forms-sample" method="POST" action="{{ route('user.profile.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="Full Name">
                      <div>
                          @error('name')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" value="{{$user->username}}" class="form-control" id="username" placeholder="Username">
                      <div>
                          @error('username')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Email Address">
                      <div>
                          @error('email')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>


                  <div class="form-group">
                    <label>Upload User Photo</label>
                    <div class="row d-flex align-items-center">
                      <div class="col-1">
                        <img width="100" height="100" src="{{route('home')}}/storage/images/{{$user->photo}}">
                      </div>
                      <div class="col">
                        <input type="file" name="photo">
                        <input type="hidden" name="photoUpdate" value="{{$user->photo}}">
                      </div>
                    </div>
                    <small class="text-danger">
                      @error('photo')
                          <small class="text-danger">{{$message}}</small>
                      @enderror
                    </small>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" class="form-control" id="password" placeholder="Password">
                    <div>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success mr-2">Update Profile</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

  @endsection