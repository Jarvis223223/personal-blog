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
            <h6 class="m-0 font-weight-bold text-primary">Post</h6>
          </div>
          <div class="col-md-6">
            <a href="{{url('admin/posts/create')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-plus-circle-dotted"></i> Add New</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Actions</th>
                </tr>
              </thead>
              @foreach ($posts as $index => $post)
              <tbody>                                   
                <tr>
                  <td>{{$index + $posts->firstItem()}}</td>
                  <td>{{$post->category->name}}</td>
                  <td>
                    <img src="{{asset('storage/post-images/'. $post->image)}}" width="100px">
                  </td>
                  <td>{{$post->title}}</td>
                  <td><textarea rows="3">{{$post->content}}</textarea></td>
                  <td>
                    <form action="{{url('admin/posts/'. $post->id)}}" method="post">
                      @csrf @method('delete')
                      <a href="{{ url('admin/posts/'. $post->id . '/edit') }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure!')"><i class="bi bi-trash3"></i></button>
                      <a href="{{url('admin/posts/'. $post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-comments"></i> Comments</a>
                    </form>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>            
        </div>
      </div>
      <div class="card-footer">
        {{$posts->links()}}
      </div>
    </div>
    </div>
  </div>
@endsection