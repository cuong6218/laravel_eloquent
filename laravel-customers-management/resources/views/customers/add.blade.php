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
    <h1>Form add Customer</h1>
<div class="container">
<form method="post" action="{{Route('customers.addCustomer')}}">
    @csrf
<div class="form-group">
    <label >Name customer</label>
    <input type="text" name="name" class="form-control" placeholder="Customer name">
</div>
<div class="form-group">
    <label>Date of birth</label>
    <input type="date" name="dob" class="form-control"  placeholder="Date of birth">
</div>
<div class="form-group">
    <label >Email</label>
    <input type="text" name="email" class="form-control"  placeholder="Email">
</div>
<button type="submit" class="btn btn-primary">Add customer</button>
</form>
</div>
@endsection
</body>
</html>
