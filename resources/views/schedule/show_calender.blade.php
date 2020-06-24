@extends('layouts.app')
@section('content')
    <div id="app">
                        <p> @{{message}}</p>

                        <p>@{{countNum()}}</p>
                        <button v-on:click='countNum'>ボタン</button>




                    <example-component></example-component>
    </div>
@endsection
