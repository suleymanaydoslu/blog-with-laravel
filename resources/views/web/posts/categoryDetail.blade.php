@extends('web.layouts.master')

@section('content')
  <div class="jumbotron">
    <a href="{{route('home')}}"><h3><i class="fa fa-home"></i> SULEYMANAYDOSLU BLOG</h3></a>
    <p>In this blog, you can find my latest posts related web technologies</p>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="page-header">
        <h3>ALL POSTS UNDER {{ strtoupper($category->title) }} CATEGORY <small>all posted items from past</small></h3>
      </div>
    </div>

    <div class="col-sm-9">
      @if(count($posts))
        @foreach($posts as $post)
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              @if($post->post->cover_image)
                <img src="{{asset($post->post->cover_image)}}" class="img-responsive">
              @else
                <img src="http://via.placeholder.com/800x150" alt="no-image">
              @endif
              <div class="caption">
                <h4>{{$post->post->title}}</h4>
                <small>{{$post->post->created_at->format('d-M-Y H:i:s')}}</small>
                <p><a href="{{route('readPost',$post->post->slug)}}" class="btn btn-primary btn-block" role="button"><i class="fa fa-search"></i> READ</a></p>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <p>There is no post to show</p>
      @endif
    </div>

    @include('web.blocks.menu')
    @include('web.blocks.categories')
  </div>
@endsection
