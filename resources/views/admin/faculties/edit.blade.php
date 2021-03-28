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
                            <h3 class="card-title">Факультет"{{$faculty->name}}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('faculties.update', ['faculty' => $faculty->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label for="name">Название факультета</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$faculty->name}}">
                                    <label for="fio_dean">Ф.И.О Декана</label>
                                    <input name="fio_dean" type="text" class="form-control" id="fio_dean" value="{{$faculty->fio_dean}}">
                                    <label for="room">Деканат</label>
                                    <input name="room" type="text" class="form-control" id="room" value="{{$faculty->room}}">
                                    <label for="phone">Телефон</label>
                                    <input name="phone" type="text" class="form-control" id="phone" value="{{$faculty->phone}}">

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


