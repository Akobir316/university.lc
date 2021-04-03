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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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

                    <div class="card" style="display:grid;grid-template-columns: 1fr 1fr 1fr;">
                        <div class="card-header" style="grid-column-start: 1;grid-column-end: 4;">
                            <h3 class="card-title">Факультеты</h3>
                        </div>
                        @if($data)
                            @foreach($data as $faculty=>$groups)
                        <div>
                            <div style="margin: 5px; " class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$faculty}}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body" style="display: none;">
                                    <ul>
                                        @foreach($groups as $group)
                                        <li><a href="{{route('timetables.show', ['timetable'=>$group->id])}}">{{$group->group}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                            @endforeach
                        @else
                            <p>Данных пока нет ...</p>
                        @endif
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


