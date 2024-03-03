@extends('admin-panel.master')
@section('content')               

  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Skills Create Form</h6>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/skills')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-skip-backward"></i></a>
            </div>
          </div>
        </div>
        <form action="{{url('admin/skills')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" placeholder="Enter Skill Name" value="{{old('name')}}">
              @error('name')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="">Percent</label>
              <input type="number" name="percent" class="form-control @error('percent') is-invalid  @enderror" placeholder="Enter Skill percent" value="{{old('percent')}}">
              @error('percent')
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