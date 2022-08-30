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

                  <h4 class="card-title">Create Post</h4>
                  <form class="forms-sample" method="POST" action="{{route('dashboard.post.store')}}">
                    @csrf

                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Post Title">
                      <div>
                          @error('title')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="excerpt">Excerpt</label>
                      <textarea name="excerpt"class="form-control" id="excerpt" rows="3" placeholder="Excerpt">{{ old('excerpt') }}</textarea>
                      <div>
                          @error('excerpt')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="category">Category</label>

                      <select class="form-control" id="category" name="category_id">
                          @foreach($categories as $category)
                              <option value="{{$category->id}}" @if($category->id === old('category_id')) selected @endif>
                                  {{$category->name}}
                              </option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Upload Feature Image</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" placeholder="Upload Image" name="feature_image" value="{{ old('feature_image') }}">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                      <div>
                          @error('feature_image')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="content">Content</label>
                      <textarea name="content"class="form-control" id="content" rows="5">{{ old('content') }}</textarea>
                      <div>
                          @error('content')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Publish Post</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

  @endsection