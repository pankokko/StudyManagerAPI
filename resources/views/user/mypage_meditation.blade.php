@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">{{$user->name}} さん</h5>
        <a type="submit" class="btn btn-primary" href="{{ route("user.mypage") }}">マイページへ戻る</a>
    </div>

    <div class="container d-flex">
        <div class="card-deck text-center">
            <meditation-set :meditation-time="{{ $weekMeditationSum }}"></meditation-set>
            <div class="card box-shadow h-50" style="width: 700px;">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">瞑想管理</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$weekMeditationSum}}分 <small class="text-muted">/ 過去7日間</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>今日の瞑想時間</li>
                        <li>{{$meditationSum}}分</li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <todays-record meditations="{{ $meditations }}"></todays-record>
@endsection


