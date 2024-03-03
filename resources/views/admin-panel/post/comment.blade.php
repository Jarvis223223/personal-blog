@extends('admin-panel.master')
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
            <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
          </div>
          <div class="col-md-6">
            <a href="{{url('admin/posts')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-skip-backward"></i> Back</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              @if ($comments->count() < 1)
              <p>No comments yet!</p>              
              @else 
              @foreach($comments as $index => $comment)
              <tbody>                                   
                <tr>
                  <td>{{++$index}}</td>
                  <td>{{$comment->text}}</td> 
                  <td>
                    <form action="{{url('admin/comment/'. $comment->id . '/show_hide')}}" method="post">
                      @csrf 
                      <button class="btn {{$comment->status == 'show' ? 'btn-danger' : 'btn-success'}} btn-sm"><i class="bi bi-dash-circle"></i>
                      {{$comment->status == 'show' ? 'Hide' : 'Show'}}
                      </button >
                    </form>
                  </td>                 
                </tr>
              </tbody>
              @endforeach
              @endif
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