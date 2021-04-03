@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Группы</h1>
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
                            <h3 class="card-title">Редактирование группы</h3>
                        </div>

                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{route('groups.update',['group'=>$group->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label>Выберите кафедру</label>
                                    <select name="kafedr_id" class="form-control">
                                        @foreach($kafedrs as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if($group->kafedr_id==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <label for="group">Название группы</label>
                                    <input type="text" name="group" id="group" class="form-control @error('group') is-invalid @enderror" value="{{$group->group}}" placeholder="Название группы">
                                    @error('group')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="date_receipts">Дата создание</label>
                                    <input name="date_receipts" type="number" min="2000" max="2100" class="form-control @error('date_receipts') is-invalid @enderror" value="{{$group->date_receipts}}" id="date_receipts" placeholder="Год">
                                    @error('date_receipts')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="course">Курс</label>
                                    <input name="course" type="number" class="form-control @error('course') is-invalid @enderror" value="{{$group->course}}" id="course" placeholder="Course">
                                    @error('course')
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

