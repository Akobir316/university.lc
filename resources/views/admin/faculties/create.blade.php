@extends('admin.layouts.layout')

@section('content')


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Студенты</h1>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Добавление факультета</h3>
                            </div>

                            <!-- /.card-header -->
                            <form role="form" method="post" action="{{route('faculties.store')}}">
                                @csrf
                                <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label for="name">Название факультета</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Название факультета">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="fio_dean">Ф.И.О Декана</label>
                                    <input name="fio_dean" type="text" class="form-control @error('fio_dean') is-invalid @enderror" id="fio_dean" value="{{old('fio_dean')}}" placeholder="F.I.O">
                                    @error('fio_dean')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="room">Деканат</label>
                                    <input name="room" type="text" class="form-control @error('room') is-invalid @enderror" value="{{old('room')}}" id="room" placeholder="Комната">
                                    @error('room')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="phone">Адресс</label>
                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" id="adress" placeholder="Телефон">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>
                                <div class="card-footer" style="background-color:#fff">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">

                                {{--<ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>--}}
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

