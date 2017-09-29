@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <ul class="list-inline">
          <li>
            <h3><strong>Comment Management</strong></h3>
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
          <th>Name</th>
          <th>Email</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(count($comments))
          @foreach($comments as $comment)
            <tr>
              <td>{{$comment->id}}</td>
              <td>{{$comment->name}}</td>
              <td>{{$comment->email}}</td>
              <td>{{$comment->created_at->format('d-M-Y H:i:s')}}</td>
              <td>
                <a href="{{ route('panel.comments.show', $comment) }}" class="btn btn-primary btn-sm"><i
                    class="fa fa-search fa-fw"></i> SHOW</a>
                <a href="{{ route('panel.comments.delete', $comment) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i
                    class="fa fa-trash fa-fw"></i> DELETE</a>
                @if($comment->status == 1)
                  <a href="{{ route('panel.comments.passive', $comment) }}" class="btn btn-warning btn-sm"><i
                      class="fa fa-times fa-fw"></i> PASSIVE</a>
                @else
                  <a href="{{ route('panel.comments.active', $comment) }}" class="btn btn-success btn-sm"><i
                      class="fa fa-check fa-fw"></i> ACTIVE</a>
                @endif
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" class="text-center"><strong>there is no comment</strong></td>
          </tr>
        @endif
        </tbody>
      </table>

      <div class="col-sm-12 text-center">
        {{ $comments->links() }}
      </div>

    </div>
  </div>
@endsection
