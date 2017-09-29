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
          <i class="fa fa-paper-plane"></i> <a href="{{route('panel.posts.index')}}">All Posts</a>
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
          <form action="{{route('panel.posts.update',$post)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label>Title</label>
              <input class="form-control" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group">
              <label>Content</label>
              <textarea name="content" class="form-control">{{$post->content}}</textarea>
            </div>

            <div class="form-group">
              <label>Categories <small>(You can select multiple)</small></label>
              <select name="categories[]" class="form-control" multiple>
                @if($categories)
                  @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ (in_array($category->id, $postCategories)) ? "selected" : ""  }}>{{$category->title}}</option>
                  @endforeach
                @endif
              </select>
            </div>

            @if($post->cover_image)
              <div class="form-group">
                <label>Current Cover Image : </label>
                <a href="{{asset($post->cover_image)}}" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-image"></i> SHOW</a>
              </div>
            @endif

            <div class="form-group">
              <label>Cover Image</label>
              <input type="file" class="form-control" name="cover_image">
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="">Please Select</option>
                <option value="1" {{ ($post->status == 1) ? "selected" : "" }}>Published</option>
                <option value="0" {{ ($post->status == 0) ? "selected" : "" }}>Draft</option>
              </select>
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
