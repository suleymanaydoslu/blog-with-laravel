@extends('panel.layouts.master')

@section('content')
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Dashboard
        <small>Statistics Overview</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-6 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-send fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{$postCount}}</div>
              <div>TOTAL POST</div>
            </div>
          </div>
        </div>
        <a href="{{route('panel.posts.index')}}">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <div class="panel panel-green">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-users fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">{{$userCount}}</div>
              <div>TOTAL USERS</div>
            </div>
          </div>
        </div>
        <a href="{{route('panel.users.index')}}">
          <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-comments"></i> LATEST COMMENTS</div>

        <div class="panel-body">
          <table class="table table-responsive table-bordered">
            <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Slug</th>
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
                    <a href="{{ route('panel.comments.delete', $comment) }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('are you sure?')"><i
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
        </div>
      </div>

    </div>
  </div>
@stop

