@extends('layouts.public')
@section('title', '勉強ページ')
@section('content')
    <study-table :records="{{$studies}}"></study-table>
@endsection
