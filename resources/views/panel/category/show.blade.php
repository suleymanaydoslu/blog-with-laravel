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

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Category Details
        </div>
        <div class="panel-body">
          <p>Title : {{ $category->title }}</p>
          <p>Created At : {{ $category->created_at->format('d-M-Y H:i:s') }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
