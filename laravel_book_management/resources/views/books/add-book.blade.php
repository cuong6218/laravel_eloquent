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
            <h1>Form add book</h1>
            <form method="post" action="{{Route('books.addBook')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Book name</label>
                    <input type="text" name="name" class="form-control" placeholder="Book name">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Author">
                </div>
                <div class="form-group">
                    <label>Publisher</label>
                    <input type="text" name="publisher" class="form-control" placeholder="Publisher">
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" class="form-control" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type book</label>
                    <select class="form-control" name="type_id">
                        @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Add Book</button>
            </form>
        </div>
    @endsection
</body>
</html>
