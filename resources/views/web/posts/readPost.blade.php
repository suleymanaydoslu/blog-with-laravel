@extends('web.layouts.master')

@section('content')
  <div class="jumbotron">
    <a href="{{route('home')}}"><h3><i class="fa fa-home"></i> SULEYMANAYDOSLU BLOG</h3></a>
    <p>In this blog, you can find my latest posts related web technologies</p>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="page-header">
        <h3>{{$post->title}}
          <small>{{$post->created_at->format('d-M-Y H:i:s')}}</small>
        </h3>
      </div>
    </div>

    <div class="col-sm-9">
      @if($post->cover_image)
        <img src="{{asset($post->cover_image)}}" class="img-responsive">
      @else
        <img src="http://via.placeholder.com/800x150" alt="no-image">
      @endif
      <hr>

      <div class="row">
        <div class="col-lg-12">
          <p>{{$post->content}}</p>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-lg-12">
          <p><strong>Category List :</strong></p>
          @if(count($post->categories))
            @foreach($post->categories as $pc)
              <span class="label label-primary">{{$pc->category->title}}</span>
            @endforeach
          @else
            <p>There is no related category</p>
          @endif
        </div>
      </div>

        <hr>

      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">Comments</div>
            <div class="panel-body">
              @if(count($comments))
                <ul class="list-group">
                  @foreach($comments as $comment)
                    <li class="list-group-item">{{$comment->comment}} / ( {{$comment->name}} - {{$comment->created_at->format('d-M-Y H:i:s')}} )</li>
                  @endforeach
                </ul>
              @else
                There is no comment
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">Make A Comment</div>
            <div class="panel-body">
              <form action="{{route('comment.post',$post->id)}}" method="post">
                {{ csrf_field() }}

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Your Full Name</label>
                    <input class="form-control" name="name" required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Your Email</label>
                    <input class="form-control" name="email" required>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Your Comment</label>
                    <textarea name="comment" class="form-control" required></textarea>
                  </div>
                </div>

                <button type="submit" class="btn btn-success"><i class="fa fa-send fa-fw"></i> CREATE</button>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-sm-3">
      @include('web.blocks.menu')
      @include('web.blocks.categories')
    </div>
  </div>
@endsection
