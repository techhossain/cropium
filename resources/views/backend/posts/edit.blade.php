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

                <h4 class="card-title">Edit Post</h4>
                <form class="forms-sample" method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')

                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="Post Title">
                      <small class="text-danger">
                        @error('title')
                            {{$message}}
                        @enderror
                      </small>
                  </div>

                  <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea name="excerpt"class="form-control" id="excerpt" rows="3" placeholder="Excerpt">{{$post->excerpt}}</textarea>
                      <small class="text-danger">
                        @error('excerpt')
                            {{$message}}
                        @enderror
                      </small>
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>

                    <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)

                      <option value="{{$category->id}}" @if($category->id === $currentCat->id) selected @endif>
                        {{$category->name}}
                      </option>

                    @endforeach

                    </select>
                  </div>

                  <div class="form-group">
                    <label>Upload Feature Image</label>
                    <div class="row d-flex align-items-center">
                      <div class="col-1">
                        <img width="100" height="100" src="/storage/images/{{$post->feature_image}}">
                      </div>
                      <div class="col">
                        <input type="file" name="feature_image">
                        <input type="hidden" name="update_feature_image" value="{{$post->feature_image}}">
                      </div>
                    </div>
                    <small class="text-danger">
                      @error('feature_image')
                          {{$message}}
                      @enderror
                    </small>
                  </div>

                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"class="form-control" id="content" rows="5">{{$post->content}}</textarea>
                    <small class="text-danger">
                        @error('content')
                            {{$message}}
                        @enderror
                      </small>
                  </div>

                  <button type="submit" class="btn btn-success mr-2">Update</button>
                  <button type="reset" class="btn btn-light">Reset</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

  @endsection