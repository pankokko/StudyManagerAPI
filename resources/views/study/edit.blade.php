@extends('layouts.public')
@section('content')

    <form action="{{route('user.study.create_record')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1"><i class="fas fa-calendar-week"></i> 日付: {{$today}}</label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"><i class="far fa-clock"></i>勉強時間の編集</label>
            <vue-timepicker format="H:m" name="study_time" placeholder="勉強時間を入力" hour-label="時間" minute-label="分"></vue-timepicker>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">タイトル</label>
            <input type="text" name="study_title" class="form-control" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">勉強の要点</label>
            <textarea name="study_content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit">登録する</button>
    </form>
@endsection
