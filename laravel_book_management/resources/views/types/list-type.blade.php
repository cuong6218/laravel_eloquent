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
        <h1>Type book</h1>
        <div class="row">
        <div class="btn btn-success col-md-auto">
            <a href="{{Route('types.showFormAdd')}}"><i class="fas fa-user-plus"></i> &nbsp;Add book type</a>
        </div>
        </div>
    <table class="table text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type name</th>
            <th scope="col">Amount book</th>
            <th scope="col">Description</th>
            <th scope="col">Created date</th>
            <th scope="col">Updated date</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>
            @forelse($types as $key => $type)
                <tr>
                <td>{{$key + 1}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->amount}}</td>
                <td>{{$type->desc}}</td>
                <td>{{$type->created_at}}</td>
                <td>{{$type->updated_at}}</td>
                <td><a href="{{Route('types.showFormUpdate', $type->id)}}"><i class="fas fa-user-edit"></i> Update</a> </td>
                <td><a href="{{Route('types.deleteType', $type->id)}}" onclick=" return confirm('Are you sure?')"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                        </svg>Delete</a> </td>
            @empty
                <td>No data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
@endsection
</body>
</html>
