@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Comment Managament
      </h3>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-list"></i> <a href="{{route('panel.comments.index')}}">All Comments</a>
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
          <p><strong>Commenter: </strong> {{ $comment->name }}</p>
          <p><strong>Email: </strong> {{ $comment->email }}</p>
          <p><strong>Related Post: </strong> {{ $comment->post->title }} <a class="btn btn-sm btn-primary" href="{{route('panel.posts.show',$comment->post->id)}}"><i class="fa fa-search"> </i> SHOW</a></p>
          <p><strong>Comment: </strong> {{ $comment->comment }}</p>
          <p><strong>Status: </strong> {{ ($comment->status == 1) ? "Active" : "Passive"  }}</p>
          <p><strong>Created At: </strong> {{ $comment->created_at->format('d-M-Y H:i:s') }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
