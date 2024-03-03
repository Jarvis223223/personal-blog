@extends('ui-panel.master')
@section('posts-content')
  <div class="row">
      <div class="col-md-8">
        @foreach($posts as $post)
        <div class="post">
          <img src="{{asset('storage/post-images/'. $post->image)}}" alt="" width="100%">
          <br><br>
          <h5><strong>{{$post->title}}</strong></h5>
          <br>
          <p>{{substr($post->content, 0, 200)}}</p>
          <a href="{{url('posts/'. $post->id .'/details')}}">
          <button class="btn btn-info">See More <i class="fas fa-angle-double-right"></i> </button>
          </a>
        </div>
        @endforeach
        {{-- {{$posts->links()}} --}}
      </div>
      <div class="col-md-4">
          <div class="siderbar">
              <form action="{{url('search_posts')}}" method="get">
                @csrf
                <div class="input-group">
                  <input type="text" name="search_data" class="form-control" placeholder="Search">
                  <button class="btn btn-success">
                      Submit <i class="fa fa-search"></i>
                  </button>
                </div>
              </form>
              <hr>
              <h5>Categories</h5>
              <ul>
                @foreach($categories as $category)
                <li> 
                  <a href="{{url('search_posts_by_category/'. $category->id)}}">{{$category->name}}<a> 
                </li>
                @endforeach
              </ul>
          </div>
      </div>
  </div>
@endsection      
