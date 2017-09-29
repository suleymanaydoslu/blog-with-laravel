@extends('web.layouts.master')

@section('content')
  <div class="jumbotron">
    <h3>SULEYMANAYDOSLU BLOG</h3>
    <p>In this blog, you can find my latest posts related web technologies</p>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="page-header">
        <h3>LATEST POSTS <small>recently posted items</small></h3>
      </div>
    </div>

    <div class="col-sm-9">
      @if(count($posts))
        @foreach($posts as $post)
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="{{asset($post->cover_image)}}" alt="...">
              <div class="caption">
                <h4>{{$post->title}}</h4>
                <small>{{$post->created_at->format('d-M-Y H:i:s')}}</small>
                <p><a href="{{route('readPost',$post->slug)}}" class="btn btn-primary btn-block" role="button"><i class="fa fa-search"></i> READ</a></p>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <p>There is no post to show</p>
      @endif
    </div>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">CATEGORIES</div>
        <!-- List group -->
        <ul class="list-group">
          @if(count($categories))
            @foreach($categories as $category)
              <li class="list-group-item">{{$category->title}}</li>
            @endforeach
          @else
            <li class="list-group-item">There is no category to show.</li>
          @endif
        </ul>
      </div>
    </div>
  </div>
@endsection
