@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        User Managament
      </h3>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-user"></i> <a href="{{route('panel.posts.index')}}">All Posts</a>
        </li>
      </ol>
    </div>
  </div>

  @include('panel.blocks.session_messages')

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          User Details
        </div>
        <div class="panel-body">
          <p><strong>First Name: </strong> {{ $user->first_name }}</p>
          <p><strong>Last Name: </strong> {{ $user->last_name }}</p>
          <p><strong>Email Adress: </strong> {{ $user->email }}</p>
          <p><strong>Created At: </strong> {{ $user->created_at->format('d-M-Y H:i:s') }}</p>
          <p><strong>Updated At: </strong> {{ $user->updated_at->format('d-M-Y H:i:s') }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
