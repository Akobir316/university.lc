@extends('layout')
@section('content')
<div class="card card-info" style="margin: 100px 350px 100px 350px">
    <div class="card-header">
        <h3 class="card-title">University monitoring system</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('login')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Вход</button>
            <a style="margin-left: 150px" href="{{route('register.create')}}">Registration</a>
        </div>
        <!-- /.card-footer -->
    </form>

</div>
@endsection
