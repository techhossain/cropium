@extends('backend.admin.layout')
  @section('content')
        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              @if(session()->get('message'))
              <div class="row">
                <div class="col">
                  <div class="alert alert-success">
                    {{session('message')}}
                  </div>
                </div>
              </div>
              @endif
              
              <div class="row">
                <div class="col">
                <h4 class="card-title">All Users</h4>
                </div>
                <div class="col">
                  <form class="ml-auto search-form d-none d-md-block" action="{{route('users.index')}}" method="GET">
                    <div class="form-group">
                      <input value="{{$searchKw}}" type="search" name="search" class="form-control" placeholder="Search Post">
                    </div>
                  </form>
                </div>
              </div>


              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> Photo </th>
                    <th> Name</th>
                    <th> Username </th>
                    <th> Email </th>
                    <th> Role </th>
                    <th> <> </th>
                  </tr>
                </thead>
                <tbody>

                @if($users->count() > 0)

                @foreach($users as $user)

                  <tr>
                    <td>{{$user->id}}</td>
                    <td>
                      <img src="{{ route('home') }}/storage/images/{{$user->photo}}" alt="">
                    </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->username}}</td>
                    <td> {{$user->email}}</td>
                    <td> {{ ucfirst( $user->getRoleNames()[0] ) }}</td>
                    <td>
                      <a href="{{route('users.edit', $user->id)}}">
                        <i class="fa fa-lg fa-edit"></i>
                      </a>

                      <form class="d-inline" method="POST" action="{{route('users.destroy', $user->id)}}">
                        @csrf
                        @method('delete')

                        <button class="btn d-inline" type="submit">
                          <i class="fa fa-trash fa-lg text-danger"></i>
                        </button>
                      </form>
                      

                    </td>
                  </tr>
                @endforeach

                @endif

                </tbody>
              </table>

              <div class="row order-md-1">
                <div class="col-lg-12">

                    {{ $users->links("vendor.pagination.bootstrap-4") }}

                </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  @endsection