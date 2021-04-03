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
                            <h3 class="card-title">Добавление в расписание группы {{$group->group}} нового предмета</h3>
                        </div>

                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{route('timetables.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label>Выберите день недели</label>
                                    <select name="day_id" class="form-control">
                                        @foreach($days as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('day_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>

                                    <label>Выберите пару</label>
                                    <select name="lesson_id" class="form-control">
                                        @foreach($lessons as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('lesson_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label>Выберите предмет</label>
                                    <select name="discipline_id" class="form-control">
                                        @foreach($disciplines as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('discipline_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label>Выберите преподователя</label>
                                    <select name="teacher_id" class="form-control">
                                        @foreach($teachers as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('teacher_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label>Выберите тип занятия</label>
                                    <select name="less_type_id" class="form-control">
                                        @foreach($lesstypes as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('lesstype_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label>Выберите комнату</label>
                                    <select name="classroom_id" class="form-control">
                                        @foreach($classrooms as $classroom)
                                            <option value="{{$classroom['id']}}"
                                                    @if(old('classroom_id')==$classroom['id'])
                                                    selected
                                                @endif
                                            >{{$classroom['name']}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <input type="hidden" name="group_id" value="{{$group->id}}">

                            </div>
                            <div class="card-footer" style="background-color:#fff">
                                <button type="submit" class="btn btn-primary">Добавить</button>
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

