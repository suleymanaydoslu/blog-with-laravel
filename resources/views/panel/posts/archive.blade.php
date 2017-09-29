@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <ul class="list-inline">
          <li>
            <strong>Post Management</strong>
          </li>
          <li class="pull-right">
            <a href="{{route('panel.posts.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> CURRENT</a>
          </li>
          <li class="pull-right">
            <a href="{{route('panel.posts.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE
              POST</a>
          </li>
        </ul>
      </div>
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
      <table class="table table-responsive table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Slug</th>
          <th>Deleted At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts))
          @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->slug}}</td>
              <td>{{$post->deleted_at->format('d-M-Y H:i:s')}}</td>
              <td>
                <a href="{{ route('panel.posts.restore', $post) }}" class="btn btn-info btn-sm"><i
                    class="fa fa-refresh fa-fw"></i> RESTORE</a>
                <a href="{{ route('panel.posts.remove', $post) }}" class="btn btn-danger btn-sm"
                   onclick="return confirm('are you sure?')"><i
                    class="fa fa-trash fa-fw"></i> REMOVE</a>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" class="text-center"><strong>there is no post</strong></td>
          </tr>
        @endif
        </tbody>
      </table>

      <div class="col-sm-12 text-center">
        {{ $posts->links() }}
      </div>

    </div>
  </div>
@endsection
