@extends('layouts.public')
@section('content')
        <div class="form-group">
            <label for="exampleFormControlInput1"><i class="fas fa-calendar-week"></i> 日付:{{$record->study_dt}} </label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">タイトル</label>
            <input type="text" name="study_title" readonly value="{{$record->study_title}}" class="form-control" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">勉強の要点</label>
            <textarea name="study_content" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{$record->study_content}}</textarea>
        </div>
        <a class="btn btn-primary" href="#" role="button">編集</a>
        <form action="{{route('user.study.delete_Record', ['id' => $record->id])}}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">削除</button>
        </form>
@endsection
