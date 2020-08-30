@extends('layouts.public')
@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">MeditationSportsManager</h1>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">瞑想管理</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$weekMeditationSum}}分 <small class="text-muted">/ 今週</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="h4 font-weight-bold" >今日の瞑想時間</li>
                        <li>{{$meditationSum}}分</li>
                        <li></li>
                    </ul>
                    <a class="btn btn-lg btn-block btn-outline-primary" href="{{route('user.mypage_meditation')}}">管理画面に入る</a>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">ジョギング管理</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>20 users included</li>
                        <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">勉強記録管理</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"> <small class="text-muted">/ 今週</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="h4 font-weight-bold">今日の勉強時間</li>
                        <li>分</li>
                    </ul>
                    <a class="btn btn-lg btn-block btn-outline-primary" href="{{route('user.study.mypage_study')}}">管理画面に入る</a>
                </div>
            </div>
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
