@extends('admin-panel.master')
@section('content')
  {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Skills</h1>
  </div>                     --}}

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
            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
          </div>
          <div class="col-md-6">
            <a href="{{url('admin/projects/create')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-plus-circle-dotted"></i> Add New</a>
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
                  <th>Url</th>
                  <th>Actions</th>
                </tr>
              </thead>
              @foreach ($projects as $project)
              <tbody>                                   
                <tr>
                  <td>{{$project->id}}</td>
                  <td>{{$project->name}}</td>
                  <td>{{$project->url}}</td>
                  <td>
                    <form action="{{url('admin/projects/'. $project->id)}}" method="post">
                      @csrf @method('delete')
                      <a href="{{ url('admin/projects/'. $project->id . '/edit') }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure!')"><i class="bi bi-trash3"></i></button>
                    </form>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>            
        </div>
      </div>
      <div class="card-footer">
        {{-- {{$skills->links()}} --}}
      </div>
    </div>
    </div>
  </div>
@endsection