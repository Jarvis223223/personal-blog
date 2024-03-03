@extends('admin-panel.master')
@section('content')               

  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Post Create Form</h6>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/posts')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-skip-backward"></i> Back</a>
            </div>
          </div>
        </div>
        <form action="{{url('admin/posts')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="">Category</label>
              <select name="category_id" class="form-control @error('category_id') is-invalid  @enderror">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              @error('category_id')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Image</label> <br>
              <input type="file" name="image" class="@error('image') is-invalid  @enderror">
              @error('image')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" placeholder='Enter category title'  value="{{old('title')}}">
              @error('title')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Content</label>
              <textarea name="content" rows="4" placeholder="Message..." class="form-control @error('title') is-invalid  @enderror">{{old('content')}}</textarea>
              @error('content')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
          </div>
            <div class="card-footer">
              <button class="btn btn-primary">Create</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
@endsection