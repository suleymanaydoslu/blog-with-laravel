@extends('panel.layouts.master')

@section('content')
  <!-- Page Heading -->
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
          <i class="fa fa-list"></i> <a href="{{route('panel.category.index')}}">All Categories</a>
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-12">

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="panel panel-primary">
        <div class="panel-heading">
          CREATE CATEGORY
        </div>
        <div class="panel-body">
          <form action="{{route('panel.category.store')}}" method="post">
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
