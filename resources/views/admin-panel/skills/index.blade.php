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
            <h6 class="m-0 font-weight-bold text-primary">Skills</h6>
          </div>
          <div class="col-md-6">
            <a href="{{url('admin/skills/create')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-plus-circle-dotted"></i></a>
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
                  <th>Percent</th>
                  <th>Actions</th>
                </tr>
              </thead>
              {{-- @php $i = 1 @endphp  --}}
              @foreach ($skills as $skill)
              <tbody>                                   
                <tr>
                  <td>{{$skill->id}}</td>
                  <td>{{$skill->name}}</td>
                  <td>{{$skill->percent}}</td>
                  <td>
                    <form action="{{url('admin/skills/'. $skill->id)}}" method="post">
                      @csrf @method('delete')
                      <a href="{{ url('admin/skills/'. $skill->id . '/edit') }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
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
        {{$skills->links()}}
      </div>
    </div>
    </div>
  </div>
@endsection