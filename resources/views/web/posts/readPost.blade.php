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
          @if($post->categories)
            <p><strong>Category List :</strong></p>
            @foreach($post->categories as $pc)
              <span class="label label-primary">{{$pc->category->title}}</span>
            @endforeach
          @endif
        </div>
      </div>

    </div>
    @include('web.blocks.menu')
    @include('web.blocks.menu')
    @include('web.blocks.categories')
  </div>
@endsection
