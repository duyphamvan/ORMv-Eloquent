@extends('home')
@section('title', 'Thêm mới khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Add New Category</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('store.ct')}}">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Now</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection