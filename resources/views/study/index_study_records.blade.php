@extends('layouts.public')
@section('css')
    <link href="{{asset("css/app.css")}}">
@endsection
@section('content')

    @include('components.flash')
    <div class="container">
        @foreach($userRecords as $userRecord )
        <div class="jumbotron">
            <p>{{$userRecord->study_dt}}</p>
            <h3 class="display-4">{{$userRecord->study_title}}</h3>
            <p class="lead">勉強時間:{{$userRecord->study_hour . '時間' . $userRecord->study_minutes . '分'}}</p>
            <hr class="my-4">
            <p>{{$userRecord->study_content}}</p>
            <a class="btn btn-primary btn-lg" href="{{route('user.study.show', ['id' => $userRecord->id])}}" role="button">詳細を確認</a>
        </div>
        @endforeach
    </div>
@endsection
