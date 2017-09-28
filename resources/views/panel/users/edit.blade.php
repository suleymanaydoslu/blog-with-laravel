@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        User Management
      </h3>
      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li>
          <i class="fa fa-user"></i> <a href="{{route('panel.users.index')}}">All Users</a>
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">

      @include('panel.blocks.validation_errors')

      <div class="panel panel-primary">
        <div class="panel-heading">
          EDIT USER
        </div>
        <div class="panel-body">
          <form action="{{route('panel.users.update',$user)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" required>
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" required>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
              <label>Password Again</label>
              <input type="password" class="form-control" name="password_confirmation">
            </div>


            <button type="submit" class="btn btn-success"><i class="fa fa-send fa-fw"></i> UPDATE</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
