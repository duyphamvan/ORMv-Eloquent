@extends('home')
@section('title', 'List Categories')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>List Categories</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Blogs</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ count($category->blogs) }}</td>
                            <td><a href="{{route('edit.ct',$category->id)}}">sửa</a></td>
                            <td><a href="{{route('delete.ct',$category->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('create.ct')}}">Add New Category</a>
        </div>
    </div>
@endsection