@extends('layouts.app')
@section('content')

    <div class="container d-flex">
        <div class="card-deck text-center">
            <meditation-set></meditation-set>
            <div class="card box-shadow h-50" style="width: 700px;">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">瞑想管理</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">●●分 <small class="text-muted">/ 今週</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>今日の瞑想時間</li>
                        <li>●●●分</li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <todays-record meditations="{{ $meditations }}"></todays-record>
@endsection


