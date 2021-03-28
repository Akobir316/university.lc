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
                                <h3 class="card-title">Список студентов</h3>
                            </div>

                            <!-- /.card-header -->
                            <form role="form" method="post" action="{{route('students.store')}}">
                                @csrf
                                <div class="card-body">
                                <div class="form-group col-md-6">
                                        <label>Выберите группу</label>
                                        <select name="group_id" class="form-control @error('group') is-invalid @enderror">
                                            @foreach($groups as $k=>$v)
                                                <option value="{{$k}}"
                                                @if(old('group')==$k)
                                                    selected
                                                    @endif
                                                >{{$v}}</option>
                                            @endforeach
                                        </select>
                                    @error('group')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="fio">Ф.И.О</label>
                                    <input name="fio" type="text" class="form-control @error('fio') is-invalid @enderror" id="fio" value="{{old('fio')}}" placeholder="F.I.O">
                                    @error('fio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="dob">Дата рождение</label>
                                    <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" value="{{old('dob')}}" id="dob" placeholder="Дата рождение">
                                    @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="adress">Адресс</label>
                                    <input name="adress" type="text" class="form-control @error('adress') is-invalid @enderror" value="{{old('adress')}}" id="adress" placeholder="Адрес">
                                    @error('adress')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="user_id">User id</label>
                                    <input type="number" name="user_id" id="user_id" class="form-control" value="{{old('user_id')}}">
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

