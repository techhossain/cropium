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
                  <div class="card">
                    <div class="card-body">
                      <h4>Edit Category</h4>
                      <hr>

                <form class="forms-sample" method="POST" action="{{route('categories.update', $current->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')

                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" value="{{$current->name}}" class="form-control" id="name">
                  </div>

                  <div class="form-group">
                    <label for="slug">Category Slug</label>
                    <input type="text" name="slug" value="{{$current->slug}}" class="form-control" id="slug">
                  </div>
                  <button type="submit" class="btn btn-success mr-2">Update Category</button>
                </form>


                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                    
                    <table class="table table-striped mt-3">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Category Name</th>
                            <th> <> </th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($categories->count() > 0)

                        @foreach($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td> {{$category->name}} </td>
                            <td>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-link">
                                <i class="fa fa-lg fa-edit"></i>
                            </a>

                            <form class="d-inline" method="POST" action="{{route('categories.destroy', $category->id)}}">
                                @csrf
                                @method('delete')


                                <button type="button" class="btn" data-toggle="modal" data-target="#deleteCategory-{{$category->id}}"><i class="fa fa-trash fa-lg text-danger"></i></button>

<!-- Modal -->
<div class="modal fade" id="deleteCategory-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body my-3">
        <p>
      Do you really want to delete <code>{{$category->name}}</code> category??
      </p>

      



      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash fa-lg text-light"></i>Delete Now</button>
      </div>
    </div>
  </div>
</div>                            </form>
                            

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
      </div>
    </div>

  @endsection