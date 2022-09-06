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

                  <h4 class="card-title">Create User</h4>

                  <form class="forms-sample" method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Full Name">
                      <div>
                          @error('name')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Email Address">
                      <div>
                          @error('email')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Upload User Photo</label>
                      <p><input type="file" name="photo"></p>
                      <div>
                          @error('photo')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" placeholder="Password">
                      <div>
                          @error('password')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="cpassword">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="cpassword" placeholder="Confirm Password">
                      <div>
                          @error('password')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="py-3">
                      <label for="role">Role</label>
                      <br>
                      
                      @foreach ($roles::all()->pluck('name') as $role)
                        <div class="form-check form-check-inline" style="display: inline-flex !important;">
                          <input class="form-check-input" type="radio" name="role" id="{{$role}}" value="{{$role}}">
                          <label class="form-check-label" for="{{$role}}"> {{$role}} </label>
                        </div>
                      @endforeach

                      <div>
                          @error('role')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>




                    <button type="submit" class="btn btn-success mr-2">Create User</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

  @endsection