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
        <h1>List of book</h1>
        @if(Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{Session::get('success')}}
            </p>
            @endif
        <div class="row">
        <div class="btn btn-success col-md-auto">
        <a href="{{Route('books.showFormAdd')}}"><i class="fas fa-user-plus"></i> &nbsp;Add Book</a>
        </div>
            <div class="col-md-9">
            <form method="post" action="{{Route('books.searchBook')}}" class="form-inline my-2 my-lg-0">
                <select class="custom-select" name="checkBook">
                    <option value="name">Book name</option>
                    <option value="type">Type</option>
                    <option value="author">Author</option>
                    <option value="publisher">Publisher</option>
                </select>
                @csrf
                <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
        </div>
    <table class="table text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book name</th>
            <th scope="col">Type</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
            <th scope="col">Amount</th>
{{--            <th scope="col">Price</th>--}}
            <th scope="col">Image</th>
{{--            <th scope="col">Description</th>--}}
            <th scope="col">Created date</th>
            <th scope="col">Updated date</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>
            @forelse($books as $key => $book)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$book->name}}</td>
                    @if($book->type)
                        <td>{{$book->type->name}}</td>
                    @else
                        <td>Not classified</td>
                    @endif
                    <td>{{$book->author}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->amount}}</td>
{{--                    <td>{{$book->price}}</td>--}}
                    <td><img src="{{asset('storage/'.$book->image)}}" style="width: 50px; height: 50px"></td>
{{--                    <td>{{$book->desc}}</td>--}}
                    <td>{{$book->created_at}}</td>
                    <td>{{$book->updated_at}}</td>
                    <td><a href="{{Route('books.showFormUpdate', $book->id)}}"><i class="fas fa-user-edit"></i><br/>Update</a></td>
                    <td><a href="{{Route('books.deleteBook', $book->id)}}" onclick=" return confirm('Are you sure?')"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
