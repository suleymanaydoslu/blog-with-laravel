@extends('panel.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <ul class="list-inline">
          <li>
            <h3><strong>User Management</strong></h3>
          </li>
          <li class="pull-right">
            <a href="{{route('panel.users.archive')}}" class="btn btn-primary btn-sm"><i class="fa fa-cloud"></i> ARCHIVE</a>
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
          <i class="fa fa-list"></i> <a href="{{route('panel.users.index')}}">All User</a>
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
          <th>First Name - Last Name</th>
          <th>Email Adress</th>
          <th>Created At</th>
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
              <td>{{$user->created_at->format('d-M-Y H:i:s')}}</td>
              <td>
                <a href="{{ route('panel.users.edit', $user) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil fa-fw"></i> EDİT</a>
                <a href="{{ route('panel.users.show', $user) }}" class="btn btn-warning btn-sm"><i class="fa fa-search fa-fw"></i> SHOW</a>
                <form action="{{ route('panel.users.destroy',$user) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')">
                    <i class="fa fa-trash fa-fw"></i> DELETE
                  </button>
                </form>
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
        {{ $users->links() }}
      </div>

    </div>
  </div>
@endsection
