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
                            <h3 class="card-title">Ф.И.О "{{ $teacher->fio }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('teachers.update', ['teacher' => $teacher->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-6">
                                    <label>Кафедра</label>
                                    <select name="kafedr_id" class="form-control @error('kafedr') is-invalid @enderror">
                                        @foreach($kafedrs as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if($teacher->kafedr_id==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                    @error('kafedr')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="fio">Ф.И.О</label>
                                    <input name="fio" type="text" class="form-control @error('fio') is-invalid @enderror" id="fio" value="{{$teacher->fio}}" placeholder="F.I.O">
                                    @error('fio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="position">Научное звание</label>
                                    <input name="position" type="text" class="form-control @error('position') is-invalid @enderror" value="{{$teacher->position}}" id="position" placeholder="position">
                                    @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="rate">Ставка</label>
                                    <input name="rate" type="number" min="0" step="0.1" class="form-control @error('rate') is-invalid @enderror" value="{{$teacher->rate}}" id="rate" placeholder="0.0">
                                    @error('rate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="stag">Стаж</label>
                                    <input name="stag" type="number" min="0"  class="form-control @error('stag') is-invalid @enderror" value="{{$teacher->stag}}" id="stag" placeholder="Стаж">
                                    @error('stag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="adress">Адрес</label>
                                    <input name="adress" type="text" class="form-control @error('adress') is-invalid @enderror" value="{{$teacher->adress}}" id="adress" placeholder="Адрес">
                                    @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="age">Возраст</label>
                                    <input name="age" type="number" min="0"  class="form-control @error('age') is-invalid @enderror" value="{{$teacher->age}}" id="age" placeholder="Возраст">
                                    @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label for="user_id">User id</label>
                                    <input type="number" name="user_id" id="user_id" class="form-control" value="{{$teacher->user_id}}">
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


