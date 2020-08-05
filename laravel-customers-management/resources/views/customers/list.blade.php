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
    <a href="{{Route('customers.showFormAdd')}}">Add Customer</a>
<table class="table text-center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Date of birth</th>
        <th scope="col">Email</th>
        <th scope="col">created_at</th>
        <th scope="col">Updated_at</th>
        <th scope="col" colspan="2">Action</th>


    </tr>
    </thead>

        @forelse($customers as $key => $customer)
        <tr>
            <td>{{$key +1}}</td>
            <td>{{$customer['name']}}</td>
            <td>{{$customer['dob']}}</td>
            <td>{{$customer['email']}}</td>
            <td>{{$customer['created_at']}}</td>
            <td>{{$customer['updated_at']}}</td>
            <td><a href="{{Route('customers.showEditForm')}}">Edit</a> </td>
            <td><a href="{{Route('customers.deleteCustomer', $customer['id'])}}">Delete</a> </td>
        </tr>
        @empty
        <tr><td>No data</td></tr>
        @endforelse


</table>
</div>
@endsection

</body>
</html>
