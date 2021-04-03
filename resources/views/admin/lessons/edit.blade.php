@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Пары</h1>
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
                            <h3 class="card-title">Редактирование времени пары</h3>
                        </div>

                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{route('lessons.update',['lesson'=>$par->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label for="start_time">Пара начинается</label>
                                    <input name="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" value="{{$par->start_time}}" id="start_time">
                                    @error('start_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="end_time">Пара заканчивается</label>
                                    <input name="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" value="{{$par->end_time}}" id="end_time">
                                    @error('end_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>
                            <div class="card-footer" style="background-color:#fff">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

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

