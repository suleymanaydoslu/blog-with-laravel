@extends('panel.layouts.master')

@section('extra_css')
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection

@section('content')

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">
        Category
      </h3>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i> <a href="{{route('panel.dashboard')}}">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-shopping-cart"></i> <a href="{{route('panel.category.index')}}">All Categories</a>
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  @if(Session::has('success'))
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col-lg-12">
      <table id="example" class="display" cellspacing="0" width="100%">
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
          @if($categories)
            @foreach($categories as $category)
              <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>
                  <a href="{{ route('panel.category.edit', $category) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil fa-fw"></i> EDİT</a>
                  <form action="{{ route('panel.category.destroy',$category) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash fa-fw"></i> DELETE
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>


@endsection

@section('extra_js')
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#example').DataTable();
    });
  </script>
@endsection
