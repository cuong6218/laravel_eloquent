@extends('master')
@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <input type="text" class="form-control" value="Dashboard" disabled>
        <div class="row">
            <div class="btn btn-info pt-3 pb-3 col-md-3">
                <p1>List Book</p1>
                <a href="{{Route('books.showList')}}">view detail</a>
            </div>
            <div class="btn btn-warning pt-3 pb-3 col-md-3">
                <p1>List Reader</p1>
                <a href="{{Route('readers.showList')}}">view detail</a>
            </div>
        </div>
    </div>
@endsection
