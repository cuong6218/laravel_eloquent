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
        <h1>Form add book type</h1>
        <form method="post" action="{{Route('types.addType')}}">
            @csrf
            <div class="form-group">
                <label>Type name</label>
                <input type="text" name="name" class="form-control" placeholder="Type name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="desc" class="form-control" rows="3" placeholder="Description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Add book type</button>
        </form>
    </div>
@endsection
</body>
</html>

