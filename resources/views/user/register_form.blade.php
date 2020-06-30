@extends('layouts.app')


@section('content')
    <div class="container">

        <form method="POST" action="{{ route("user.register_data")}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1"> 体重</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="weight">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">身長</label>
                <input type="text" class="form-control"  name="height" id="exampleInputPassword1" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
