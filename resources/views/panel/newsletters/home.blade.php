@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <ul class="list-inline">
          <li>
            <h3><strong>Newsletter Management</strong></h3>
          </li>
        </ul>
      </div>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-list"></i> <a href="{{route('panel.newsletters.index')}}">All Newsletters</a>
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
          <th>Slug</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(count($news))
          @foreach($news as $new)
            <tr>
              <td>{{$new->id}}</td>
              <td>{{$new->email}}</td>
              <td>{{$new->created_at->format('d-M-Y H:i:s')}}</td>
              <td>
                <a href="{{ route('panel.newsletters.delete', $new) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i
                    class="fa fa-trash fa-fw"></i> DELETE</a>
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
        {{ $news->links() }}
      </div>

    </div>
  </div>
@endsection
