@extends('home')
@section('title','LIST BLOGS')
@section('content')
    @if(!isset($blogs))
        <h5 class="text-primary">Dữ liệu không tồn tại!</h5>
    @else
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">

                <h3><a href="{{route('index')}}">List Blogs</a></h3>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    @foreach($categories as $key => $category)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('filter', $category->id)}}" name="category_id">{{$category->name}} <span class="sr-only">(current)</span></a>
                    </li>
                   @endforeach
                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
                    @csrf
                    <input class="form-control mr-sm-2" name="keywords" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        @if(count($blogs)==0)
            <h5 class="text-primary">Hiện tại chưa có task nào được tạo!</h5>
        @else
            <div class="card-group">
            @foreach($blogs as $key=>$blog)
                    <div class="card">
                        <img src="{{asset("storage/$blog->image")}}" class="card-img-top" alt="..."
                             style="width: 100%">
                        <div class="card-body">
                            <h5 class="card-title">Title: {{$blog->title}}</h5>
                            <p class="card-content">Content: {{$blog->content}}</p>
                            <p class="card-author">Author: {{$blog->author}}</p>
                            <p class="card-date">Date: {{$blog->due_date}}</p>
                            <p class="card-ct">Category: {{$blog->category->name}}</p>
                            <a href="{{route('read',$blog->id)}}" class="btn btn-primary">Read More</a>
                            <a href="{{route('edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('delete',$blog->id)}}" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
            @endforeach
            </div>
        @endif
        <div class="mt-3">
            <a class="btn btn-primary add" href="{{ route('create') }}">Thêm mới</a>
            <div class="float-right">
                {{--{{$blogs->links()}}--}}
                {{ $blogs->appends(request()->query()) }}
            </div>
        </div>

    @endif
@endsection













