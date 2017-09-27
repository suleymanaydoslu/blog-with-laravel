@extends('panel.layouts.master2')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="well">
                <p class="lead text-center">BLOG ADMIN PANEL</p>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('panel.login.post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Please enter your email adress" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Please enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send fa-fw"></i> LOGIN</button>
                </form>
            </div>
        </div>
    </div>
@endsection