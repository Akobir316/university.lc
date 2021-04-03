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
                            <h3 class="card-title">Кафедра "{{$kafedry->name}}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('kafedrs.update', ['kafedr' => $kafedry->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label>Факультет</label>
                                    <select name="faculty_id" class="form-control">
                                        @foreach($faculties as $k=>$v)
                                            <option @if($k==$kafedry->faculty_id) selected @endif value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label for="name">Название Кафедры</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$kafedry->name}}">
                                    <label for="fio_manage">Ф.И.О Заведущий</label>
                                    <input name="fio_manage" type="text" class="form-control" id="fio_manage" value="{{$kafedry->fio_manage}}">
                                    <label for="room">Комната</label>
                                    <input name="room" type="text" class="form-control" id="room" value="{{$kafedry->room}}">
                                    <label for="phone">Телефон</label>
                                    <input name="phone" type="text" class="form-control" id="phone" value="{{$kafedry->phone}}">

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


