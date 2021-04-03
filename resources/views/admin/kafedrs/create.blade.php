@extends('admin.layouts.layout')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Кафедры</h1>
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
                                <h3 class="card-title">Добавление кафедры</h3>
                            </div>

                            <!-- /.card-header -->
                            <form role="form" method="post" action="{{route('kafedrs.store')}}">
                                @csrf
                                <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label>Выберите факультет</label>
                                    <select name="faculty_id" class="form-control">
                                        @foreach($faculties as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('faculty_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label for="name">Название кафедры</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Название кафедры">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="fio_manage">Ф.И.О Заведущий</label>
                                    <input name="fio_manage" type="text" class="form-control @error('fio_manage') is-invalid @enderror" id="fio_manage" value="{{old('fio_manage')}}" placeholder="F.I.O">
                                    @error('fio_manage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="room">Команата</label>
                                    <input name="room" type="text" class="form-control @error('room') is-invalid @enderror" value="{{old('room')}}" id="room" placeholder="Комната">
                                    @error('room')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="phone">Телефон</label>
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

