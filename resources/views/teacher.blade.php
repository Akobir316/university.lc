<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher</title>
</head>
<body>
<div>

</div>
<p>Фильтры</p>
<form action="{{route('filters')}}" method="get">
    <label for="room">Выберите аудиторию: </label>
    <label for="korpus">Корпус</label>
    <select class="form-control" name="korpus" id="korpus">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select>
    <input  class="form-control  @error('room') is-invalid @enderror" type="number" id="room" name="room">
    <input type="hidden" value="{{date("w/H:i:s")}}" name="time">
    <button type="submit" class="btn">Найти</button>
    @error('room')
    <div class="invalid-feedback" style="color: #ff0000">{{ $message }}</div>
    @enderror
</form>

@if(!empty($res))
 <p>{{$res['k'] . ' Пара ' .$res['group'] . ' группа ' . $res['para'] .'('. $res['type'] . ')  ' . $res['teacher']}}</p>
@else
  <p>{{ session('er') }}</p>

@endif
</body>
</html>
