@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
<div class="row">
    <div class="col-12"><h1>Danh Sách Khách Hàng</h1></div>
    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
        @endif
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name Customer</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Read</th>
            <th scope="col">Edit</th>
            <th scope="col">Remove</th>
        </tr>
        </thead>
        <tbody>
        @if(count($customers)==0)
            <tr>
                <td colspan="4">Không có dữ liệu</td>
            </tr>
        @else
                @foreach($customers as $key => $customer)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{$customer->address}}</td>
                        <td><a href="{{ route('customers.read', $customer->id) }}">Xem</a></td>
                        <td><a href="{{ route('customers.edit', $customer->id) }}">Sửa</a></td>
                        <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
</div>
@endsection