<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('master')
@section('content')
    <div class="container">
        <h1>Form add reader</h1>
        <form method="post" action="{{Route('readers.addReader')}}">
            @csrf
            <div class="form-group">
                <label>Reader name</label>
                <input type="text" name="name" class="form-control" placeholder="Type reader name">
            </div>
            <div class="form-group">
                <label>Reader age</label>
                <input type="text" name="age" class="form-control" placeholder="Type reader age">
            </div>
            <div class="form-group">
                <label>Reader phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Type reader phone">
            </div>
            <div class="form-group">
                <label>Reader address</label>
                <textarea name="address" class="form-control" rows="3" placeholder="Type reader address"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Add reader</button>
        </form>
    </div>
@endsection
</body>
</html>


