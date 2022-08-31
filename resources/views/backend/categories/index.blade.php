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
                <h4 class="card-title">All Categories</h4>
                </div>
                <div class="col">
                  <form class="ml-auto search-form d-none d-md-block" action="{{route('categories.index')}}" method="GET">
                    <div class="form-group">
                      <input value="{{$searchText}}" type="search" name="search" class="form-control" placeholder="Search Post">
                    </div>
                  </form>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped mt-3">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Category Name</th>
                            <th> Category Slug </th>
                            <th> Modified on </th>
                            <th> <> </th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($categories->count() > 0)

                        @foreach($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td> {{$category->name}} </td>
                            <td> {{$category->slug}}</td>
                            <td> {{date('d, F', strtotime($category->updated_at))}}</td>
                            
                            <td>
                            <a href="{{route('categories.edit', $category->id)}}">
                                <i class="fa fa-lg fa-edit"></i>
                            </a>

                            <form class="d-inline" method="POST" action="{{route('categories.destroy', $category->id)}}">
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
                </div>
              </div>

              <!-- Blog Pagination Starts -->
              <div class="mt-3">
                <div class="row order-md-1">
                    <div class="col-lg-12">
                
                        {{ $categories->links("vendor.pagination.bootstrap-4") }}
                
                    </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  @endsection