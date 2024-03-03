@extends('admin-panel.master')
@section('content')               

  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Post Edit Form</h6>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/posts')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-skip-backward"></i> Back</a>
            </div>
          </div>
        </div>
        <form action="{{url('admin/posts/'.$post->id)}}" method="post" enctype="multipart/form-data">
          @csrf @method('put')
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="">Category</label>
              <select name="category_id" class="form-control @error('category_id') is-invalid  @enderror">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}"
                  {{$post->category_id == $category->id ? 'selected' : ''}}
                >{{$category->name}}</option>
                @endforeach
              </select>
              @error('category_id')
              <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="">Image</label> <br>
              <input type="file" name="image" class=" @error('image') is-invalid @enderror mb-2"><br>
              <img src="{{asset('storage/post-images/'. $post->image)}}" style="width: 100px;border: 1px solid gray">
              @error('image')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            
            <div class="form-group mb-3">
              <label for="">Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" placeholder='Enter category title'  value="{{ $post->title ?? old('title')}}">
              @error('title')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Content</label>
              <textarea name="content" rows="4" placeholder="Message..." class="form-control @error('content') is-invalid  @enderror">{{$post->content ?? old('content')}}</textarea>
              @error('content')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
          </div>
            <div class="card-footer">
              <button class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
@endsection