@extends('layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">University</h3>
                        @auth()
                        <span style="margin-left: 100px">

                                {{auth()->user()->name }}

                        </span>
                        @endauth
                        @if(!auth()->user())
                        <a style="margin-left: 150px" href="{{route('register.create')}}">Registration</a>
                        <a style="margin-left: 150px" href="{{route('login')}}">Login</a>
                        @endif
                        @auth()
                        <a style="margin-left: 150px" href="{{ route('logout')}}">Logout</a>
                        @endauth
                    </div>
                    <div class="card-body">
                        Start creating your amazing application!
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

