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
            <h6 class="m-0 font-weight-bold text-primary">Student Count</h6>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="">
          @if ($studentCounts->count() < 1)
            <form action="{{url('admin/student_counts/store')}}" method="post">
              @csrf
              <div class="input-group">
                <input type="number" name="count" class="form-control @error('count') is-invalid  @enderror" style="border-radius: 4px 0 0 4px">
                <button class="btn btn-primary btn-sm" style="border-radius: 0 4px 4px 0">Create</button>
                @error('count')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
              </div>
            </form>
          @endif
          <br>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Count</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>      
              @if ($studentCount)                             
              <tr>
                <td>{{$studentCount->count}}</td>
                <td>
                  <button id="addBtn" class="btn btn-info btn-sm"><i class="bi bi-plus-circle-fill"></i> Add More Student</button>
                  <form action="{{url('admin/student_counts/'. $studentCount->id .'/update')}}"    method="post" class="col-md-5" style='display: none' id="addForm">
                    @csrf 
                    <div class="input-group">
                      <input type="number" name="count" class="form-control @error('count') is-invalid @enderror" style="border-radius: 4px 0 0 4px" placeholder='Enter student count'>
                      <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 0 4px 4px 0"><i class="bi bi-plus-circle"></i> Add</button>
                      @error('count')
                      <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                    </div>
                  </form>
                </td>
              </tr>
              @endif
            </tbody>
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

@section('javascript')
  <script>
    $(document).ready(function () {
      $('#addBtn').click(function () {
        $('#addForm').css('display', 'block');
        $(this).css('display', 'none')
      })
    })
  </script>
@endsection