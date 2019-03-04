@extends('home')
@section('title', 'Thêm mới công viêc')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Thêm mới công việc</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên công việc</label>
                    <input type="text" class="form-control" name="title" >
                    <p style="color: #1f6fb2">{{$errors->first('title')}}</p>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" rows="3" name="content" ></textarea>
                    <p style="color: #1f6fb2">{{$errors->first('content')}}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file">
                    <p style="color: #1d68a7">{{$errors->first('image')}}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ngày hết hạn</label>
                    <input type="date" name="dua_date" class="form-control" >
                    <p style="color: #1f6fb2">{{$errors->first('dua_date')}}</p>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection

