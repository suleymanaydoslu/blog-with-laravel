@extends('panel.layouts.master')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Categories
        <a href="{{route('panel.categories.create')}}" class="btn btn-success btn-md pull-right"><i class="fa fa-plus"></i> CREATE CATEGORY</a>
      </h3>

      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-list"></i> <a href="{{route('panel.categories.index')}}">All Categories</a>
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
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if(count($categories))
            @foreach($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at->format('d-M-Y H:i:s')}}</td>
                <td>
                  <a href="{{ route('panel.categories.edit', $category) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil fa-fw"></i> EDİT</a>
                  <a href="{{ route('panel.categories.show', $category) }}" class="btn btn-warning btn-sm"><i class="fa fa-search fa-fw"></i> SHOW</a>
                  <form action="{{ route('panel.categories.destroy',$category) }}" method="POST">
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
              <td colspan="5" class="text-center"><strong>there is no categories</strong></td>
            </tr>
          @endif
        </tbody>
      </table>

      <div class="col-sm-12 text-center">
        {{ $categories->links() }}
      </div>

    </div>
  </div>
@endsection
