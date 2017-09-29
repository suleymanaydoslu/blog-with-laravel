@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <ul class="list-inline">
          <li>
            <strong>User Management</strong>
          </li>
          <li class="pull-right">
            <a href="{{route('panel.users.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> CURRENT</a>
          </li>
          <li class="pull-right">
            <a href="{{route('panel.users.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE
              USER</a>
          </li>
        </ul>
      </div>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-list"></i> <a href="{{route('panel.users.index')}}">All Users</a>
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
          <th>Full Name</th>
          <th>Email</th>
          <th>Deleted At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(count($users))
          @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->full_name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->deleted_at->format('d-M-Y H:i:s')}}</td>
              <td>
                <a href="{{ route('panel.users.restore', $user) }}" class="btn btn-info btn-sm"><i
                    class="fa fa-refresh fa-fw"></i> RESTORE</a>
                <a href="{{ route('panel.users.remove', $user) }}" class="btn btn-danger btn-sm"
                   onclick="return confirm('are you sure?')"><i
                    class="fa fa-trash fa-fw"></i> REMOVE</a>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" class="text-center"><strong>there is no user</strong></td>
          </tr>
        @endif
        </tbody>
      </table>

      <div class="col-sm-12 text-center">
        {{ $users->links() }}
      </div>

    </div>
  </div>
@endsection
