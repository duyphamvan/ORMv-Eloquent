@extends('home')
@section('title', 'Thêm mới công viêc')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Thêm mới công việc</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('update',$blog->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Tên công việc</label>
                    <input type="text" class="form-control" name="title" required value="{{$blog->title}}">
                </div>
                <div class="form-group">
                    <label >Nội dung</label>
                    <textarea class="form-control" rows="3" name="content" required >{{$blog->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file">
                    <img src="{{asset("storage/$blog->image")}}" alt="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ngày hết hạn</label>
                    <input type="date" name="due_date" class="form-control" required value="{{$blog->due_date}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Tác gia</label>
                    <input type="text" name="author" class="form-control" required value="{{$blog->author}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Category</label>
                    <select name="category_id" id="">
                        @foreach($categories as $key => $category)
                            <option
                                    @if($blog->category_id == $category->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$category->id}}">{{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

            </form>

        </div>

    </div>


@endsection