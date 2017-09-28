@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Post Management
      </h3>
      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li>
          <i class="fa fa-paper-plane"></i> <a href="{{route('panel.categories.index')}}">All Posts</a>
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">

      @include('panel.blocks.validation_errors')

      <div class="panel panel-primary">
        <div class="panel-heading">
          CREATE POST
        </div>
        <div class="panel-body">
          <form action="{{route('panel.posts.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Title</label>
              <input class="form-control" name="title">
            </div>

            <div class="form-group">
              <label>Content</label>
              <textarea name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>Categories <small>(You can select multiple)</small></label>
              <select name="categories[]" class="form-control" multiple>
                @if($categories)
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
                @endif
              </select>
            </div>

            <div class="form-group">
              <label>Cover Image</label>
              <input type="file" class="form-control" name="cover_image">
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="">Please Select</option>
                <option value="1">Published</option>
                <option value="0">Draft</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success"><i class="fa fa-send fa-fw"></i> CREATE</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
