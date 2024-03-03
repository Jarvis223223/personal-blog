@extends('admin-panel.master')
@section('content')               

  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Category Edit Form</h6>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/projects')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-skip-backward"></i> Back</a>
            </div>
          </div>
        </div>
        <form action="{{url('admin/categories/'. $category->id)}}" method="post">
          @csrf @method('put')
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" placeholder="Enter Project Name" value="{{$category->name ?? old('name')}}">
              @error('name')
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