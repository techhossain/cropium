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
                <h4 class="card-title">All Posts</h4>
                </div>
                <div class="col">
                  <form class="ml-auto search-form d-none d-md-block" action="{{route('posts.index')}}" method="GET">
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
                      <img class="thumb-image" src="/storage/images/{{$post->feature_image}}" alt="image">
                    </td>
                    <td> {{$post->title}} </td>
                    <td>
                    {{$post->category->name}}
                    </td>
                    <td> {{$post->user->name}}</td>
                    <td>{{$post->views}}</td>
                    <td> {{date('d, F', strtotime($post->updated_at))}}</td>
                    
                    <td>
                      <a href="{{route('posts.edit', $post->id)}}">
                        <i class="fa fa-lg fa-edit"></i>
                      </a>

                      <form class="d-inline" method="POST" action="{{route('posts.destroy', $post->id)}}">
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