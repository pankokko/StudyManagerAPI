<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">{{Auth::user()->name}} さん</h5>
    <a type="submit" class="btn btn-primary" href="{{ route("user.mypage") }}">マイページへ戻る</a>
    @auth
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary">ログアウト</button>
        </form>
    @endif
</div>
