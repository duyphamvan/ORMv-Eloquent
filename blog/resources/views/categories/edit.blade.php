@extends('home')
@section('title', 'Cập nhật thông tin tỉnh thành')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Edit Category</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('update.ct',$category->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Tên tỉnh</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection