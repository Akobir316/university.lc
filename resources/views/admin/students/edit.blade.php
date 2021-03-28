@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ф.И.О "{{ $student->fio }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('students.update', ['student' => $student->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label>Группа</label>
                                    <select name="group_id" class="form-control">
                                        @foreach($groups as $k=>$v)
                                            <option @if($k==$student->group_id) selected @endif value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>

                                    <label for="fio">Ф.И.О</label>
                                    <input name="fio" type="text" class="form-control" id="fio" value="{{$student->fio}}">
                                    <label for="dob">Дата рождение</label>
                                    <input name="dob" type="date" class="form-control" id="dob" value="{{$student->dob}}">
                                    <label for="adress">Адресс</label>
                                    <input name="adress" type="text" class="form-control" id="adress" value="{{$student->adress}}">
                                    <label for="user_id">User id</label>
                                    <input type="number" name="user_id" id="user_id" class="form-control" value="{{$student->user_id}}">
                                </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


