@extends('layouts.public')
@section('css')
    <link href="{{asset("css/app.css")}}">
@endsection
@section('content')


    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><a href="{{route('user.study.register_form')}}">今日のレコードを登録する</a></h1>
    </div>
    @include('components.flash')
    @if($errors->has('study_time'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{$errors->first('study_time')}}</strong>
        </div>
    @endif
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow mypage-study-card">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">今日</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="h4 font-weight-bold">今日の勉強時間</li>
                    </ul>
                    <h1 class="card-title pricing-card-title">時間 分{{ $studyToday ? $studyToday->study_minutes: null }}
                        <small class="text-muted">/ 今日</small></h1>
                </div>
            </div>
            <div class="card mb-4 box-shadow mypage-study-card">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">今週</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="h4 font-weight-bold">今週の勉強時間</li>
                    </ul>
                    <h1 class="card-title pricing-card-title">{{$studyData['weekStudies']['study_hour']}}
                        時間 {{$studyData['weekStudies']['study_minutes']}}分<small class="text-muted">/
                            今週</small></h1>
                </div>
            </div>
            <div class="card mb-4 box-shadow mypage-study-card">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">今月</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="h4 font-weight-bold">今月の勉強時間</li>
                    </ul>
                    <h1 class="card-title pricing-card-title">{{ $studyData['monthlyStudies'] }}時間
                        <small class="text-muted">/ 今月</small>
                    </h1>
                </div>
            </div>
        </div>
        <monthly-chart study-records="{{$studiesJson}}" :height="300"></monthly-chart>
    </div>


    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow mypage-study-card">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">総学習時間</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$studyData['totalStudyTime']}} 時間</h1>
                </div>
            </div>
            <div class="card mb-4 box-shadow mypage-study-card">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">総レコード数</h4>
                    <h5 class="my-0 font-weight-normal"><a href="{{route('user.study.all_records')}}">詳細を見る</a></h5>

                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$studyData['recordCount']}}<small
                            class="text-muted"></small></h1>
                </div>
            </div>
        </div>
        <target-time weekly-target={{$weeklyTargetJson}} week-total={{$weekTotalTimeJson}} csrf="{{ csrf_token() }}"></target-time>
    </div>
    </div>
@endsection
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
