@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Category
      </h3>
      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li>
          <i class="fa fa-list"></i> <a href="{{route('panel.categories.index')}}">All Categories</a>
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">

      @include('panel.blocks.validation_errors')

      <div class="panel panel-primary">
        <div class="panel-heading">
          CREATE CATEGORY
        </div>
        <div class="panel-body">
          <form action="{{route('panel.categories.store')}}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Category Name</label>
              <input class="form-control" name="title">
            </div>

            <button type="submit" class="btn btn-success"><i class="fa fa-send fa-fw"></i> CREATE</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
