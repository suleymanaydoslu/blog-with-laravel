@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Post Managament
      </h3>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-list"></i> <a href="{{route('panel.posts.index')}}">All Posts</a>
        </li>
      </ol>
    </div>
  </div>

  @include('panel.blocks.session_messages')

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Post Details
        </div>
        <div class="panel-body">
          <p><strong>Title: </strong> {{ $post->title }}</p>
          <p><strong>Slug: </strong> {{ $post->slug }}</p>
          <p><strong>Content: </strong> {{ $post->content }}</p>
          <p><strong>Status: </strong> {{ ($post->status == 1) ? "Published" : "Draft"  }}</p>
          <p><strong>Created At: </strong> {{ $post->created_at->format('d-M-Y H:i:s') }}</p>
          <p><strong>Updated At: </strong> {{ $post->updated_at->format('d-M-Y H:i:s') }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
