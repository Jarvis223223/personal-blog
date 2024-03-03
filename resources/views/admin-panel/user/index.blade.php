@extends('admin-panel.master')
@section('title', 'users index')
@section('content')               

  <div class="row">
    <div class="col-lg-12 mb-4">
      @if (session()->has('successMsg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('successMsg')}}!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="card shadow mb-4"> 
      <div class="card-header py-3">
        <div class="row">
          <div class="col-md-6">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            @php $i = 1 @endphp 
            @foreach ($users as $user)
            <tbody>
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="">
                  @if ($user->status === 'admin')
                    <span class="badge badge-lg rounded-pill badge-success">Admin</span>
                  @else 
                    <span class="badge badge-lg rounded-pill  badge-secondary">User</span>
                  @endif
                </td>
                <td>
                  <form action="{{url('admin/users/'. $user->id . '/delete')}}" method="post">
                    @csrf
                    <a href="{{ url('admin/users/'. $user->id .'/edit')}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure!')"><i class="bi bi-trash3"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection