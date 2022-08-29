@extends('backend.admin-layout')

@section('content')
        <!-- partial:partials/_sidebar.html -->
        @include('backend.sidebar')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="row">
                      <div class="col">
                      <h4 class="card-title">All Posts</h4>
                      </div>
                      <div class="col">
                        <form class="ml-auto search-form d-none d-md-block" action="{{route('dashboard-posts')}}" method="GET">
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
                          <th> Thumbnail</th>
                          <th> Post Title </th>
                          <th> Category </th>
                          <th> Author </th>
                          <th> Total Views </th>
                          <th> Modified on </th>
                          <th> <> </th>
                        </tr>
                      </thead>
                      <tbody>

                      @if($posts->count() > 0)

                      @foreach($posts as $post)

                        <tr>
                          <td>{{$post->id}}</td>
                          <td class="py-1">
                            <img class="thumb-image" src="{{$post->feature_image}}" alt="{{$post->title}}">
                          </td>
                          <td> {{$post->title}} </td>
                          <td>
                          {{$post->category->name}}
                          </td>
                          <td> {{$post->user->name}}</td>
                          <td>{{$post->views}}</td>
                          <td> {{date('d, F', strtotime($post->updated_at))}}</td>
                          <td><a href="{{route('dashboard.post.edit', $post->id)}}"><i class="fa fa-edit"></i></a></td>
                        </tr>
                      @endforeach

                      @endif

                      </tbody>
                    </table>

                    <!-- Blog Pagination Starts -->
                    <div class="mt-3">
                      @include('components.pagination')
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

    @endsection