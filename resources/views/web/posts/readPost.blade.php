@extends('web.layouts.master')

@section('content')
  <div class="jumbotron">
    <h3>SULEYMANAYDOSLU BLOG</h3>
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
          @if($post->categories)
            <p>Category List</p>
            @foreach($post->categories as $pc)
              <span class="label label-primary">{{$pc->category->title}}</span>
            @endforeach
          @endif
        </div>
      </div>

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
