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
          <i class="fa fa-list"></i> <a href="{{route('panel.categories.index')}}">All Categories</a>
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-12">

      @include('panel.blocks.validation_errors')

      <div class="panel panel-primary">
        <div class="panel-heading">
          CREATE CATEGORY
        </div>
        <div class="panel-body">
          <form action="{{route('panel.categories.update',$category)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
              <label>Category Name</label>
              <input class="form-control" name="title" value="{{ $category->title }}">
            </div>

            <button type="submit" class="btn btn-success"><i class="fa fa-send fa-fw"></i> UPDATE</button>

          </form>
        </div>
      </div>

      <div class="alert alert-warning">
         <p>
           <i class="fa fa-warning fa-md"></i>
           After you update category, "slug" will not be updated.Because of search engine indexes this can affect seo status bad.
         </p>
      </div>
    </div>
  </div>
@endsection
