@extends('admin-panel.master')
@section('title', 'users edit')
@section('content')                   

  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Users Edit Form</h6>
            </div>
            <div class="col-md-6">
              <a href="{{url('admin/users')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-skip-backward"></i> Back</a>
            </div>
          </div>
        </div>
        <form action="{{ url('admin/users/'. $user->id .'/update')}}" method="post">
          <div class="card-body">
            @csrf 
            <div class="form-group mb-3">
              <label for="">Name</label>
              <input type="text" name="name" value="{{ $user->name}}" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group mb-3">
              <label for="">Email</label>
              <input type="email" name="email" value="{{ $user->email}}" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group mb-3">
              <label for="">Status</label>
              <select name="status"  class="form-control">
                <option value="">Select status</option>
                <option value="admin"
                @if ($user->status == 'admin') selected @endif
                >Admin</option>
                <option value="user"
                @if ($user->status == 'user') selected @endif
                >User</option>
              </select>
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