@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Category
      </h3>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-list"></i> <a href="{{route('panel.categories.index')}}">All Categories</a>
        </li>
      </ol>
    </div>
  </div>

  @include('panel.blocks.session_messages')

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Category Details
        </div>
        <div class="panel-body">
          <p><strong>Title: </strong> {{ $category->title }}</p>
          <p><strong>Slug: </strong> {{ $category->slug }}</p>
          <p><strong>Created At: </strong> {{ $category->created_at->format('d-M-Y H:i:s') }}</p>
          <p><strong>Updated At: </strong> {{ $category->updated_at->format('d-M-Y H:i:s') }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
