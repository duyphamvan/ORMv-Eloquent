@extends('home')
@section('title','Customer')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name Customer</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$customer->id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{$customer->address}}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{route('customers.index')}}">Back</a>
@endsection()