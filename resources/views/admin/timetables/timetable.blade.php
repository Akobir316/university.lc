@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Расписание</h1>
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
                            <h3 class="card-title">Расписание {{$group->group}} группы</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{route('timetables.create', ['id'=>$group->id])}}" class="btn btn-primary mb-3">Добавить</a>
                            @if (count($results))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>День недели</th>
                                            <th style="width: 30px;">№</th>
                                            <th>Время</th>
                                            <th>Дисциплина</th>
                                            <th>Преподователь</th>
                                            <th>Аудитория</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($results as $day => $pars)
                                        <p hidden>{{ksort($pars)}}</p>
                                            <tr>
                                                <td rowspan="{{count($pars) +1}}">{{ $day}}
                                                </td>
                                                @foreach($pars as $par => $v)
                                                    <tr>
                                                <td>{{$par}}</td>
                                                <td>{{$v['time']}}</td>
                                                <td>{{$v['discipline']}}({{$v['lesstype']}})</td>
                                                <td>{{$v['teacher']}}</td>
                                                <td>{{$v['classroom']}}</td>
                                                <td>
                                                    <a href="{{route('timetables.edit', ['timetable'=>$v['id']])}}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form action="{{route('timetables.destroy', ['timetable'=>$v['id']])}}" method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Расписание пока нет...</p>
                            @endif
                        </div>
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

