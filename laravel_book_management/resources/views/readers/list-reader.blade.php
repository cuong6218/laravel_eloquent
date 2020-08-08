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
        <h1>List of reader</h1>
        <div class="row">
            <div class="btn btn-success col-md-auto">
                <a href="{{Route('readers.showFormAdd')}}"><i class="fas fa-user-plus"></i> &nbsp;Add reader</a>
            </div>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Reader name</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Created date</th>
                <th scope="col">Updated date</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
                @forelse($readers as $key => $reader)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$reader->name}}</td>
                        <td>{{$reader->age}}</td>
                        <td>{{$reader->phone}}</td>
                        <td>{{$reader->address}}</td>
                        <td>{{$reader->created_at}}</td>
                        <td>{{$reader->updated_at}}</td>
                        <td><a href="{{Route('readers.showFormUpdate', $reader->id)}}"><i class="fas fa-user-edit"></i><br/>Update</a></td>
                        <td><a href="{{Route('readers.deleteReader', $reader->id)}}" onclick=" return confirm('Are you sure?')"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                </svg><br/>Delete</a></td>
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

