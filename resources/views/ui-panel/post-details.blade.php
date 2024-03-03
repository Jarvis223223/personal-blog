@extends('ui-panel.master')
@section('posts-content')
  <div class="col-md-12 post-details">
    <img src="{{asset('storage/post-images/'. $post->image)}}" alt="" width="100%">
    <br><br>
    <small> 
        <strong> 
            <i class="fa fa-calendar" aria-hidden="true"></i>
            Posted On:
        </strong>
            {{date('d-M-Y', strtotime($post->created_at))}}
    </small>
    <br>
    <small>
        <strong>
            <i class="fa fa-list"></i> Category:
        </strong>
        {{$post->category->name}}
    </small>
    <br><br>
    <h5><strong>{{$post->title}}</strong></h5>
    <p style="text-align: justify;">
        {{$post->content}}
    </p>
    <div>
        <form action="" method="post">
            @csrf
            <div>
                <span>{{$likes->count()}} Likes</span>&nbsp;&nbsp;
                <span>{{$disLikes->count()}} Dislikes</span>&nbsp;&nbsp;
                <span>{{$comments->count()}} Comments</span>
            </div>
            <button formaction="{{url('posts/like/'. $post->id)}}" class="btn btn-sm btn-success like"
            @if ($likeStatus)
            @if ($likeStatus->type == 'like')
                disabled
            @endif    
            @endif    
            >
                <i class="far fa-thumbs-up"></i> Like 
            </button>
            <button formaction="{{url('posts/dislike/'. $post->id)}}" class="btn btn-sm btn-danger like"
            @if ($likeStatus)
            @if ($likeStatus->type == 'dislike')
                disabled
            @endif     
            @endif     
            >
                <i class="far fa-thumbs-down"></i> Dislike 
            </button>
            <button type="button" class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                <i class="far fa-comment"></i> Comment 
            </button>
        </form>
    </div>
    <br>
    <div class="comment-form">
        <div class="collapse" id="collapseExample">
            <form action="{{url('posts/comments/'. $post->id)}}" method="post">
                @csrf 
                <div class="form-group">
                    <textarea name="comment" cols="30" rows="3" required></textarea>
                    <br>
                    <button class="btn btn-primary btn-sm">
                        <i class="far fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>
            @foreach($comments as $comment)
            <div class="comment-show">
                <img src="https://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" alt="" width="30px"> {{$comment->user->name}} 
                <div class=" comment-box mt-2">
                    {{$comment->text}}
                </div>
            </div> 
            @endforeach           
          </div>
    </div>
  </div>
@endsection
