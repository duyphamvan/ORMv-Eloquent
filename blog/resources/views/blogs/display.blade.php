@extends('home')
@section('title','LIST BLOGS')
@section('content')
    @if(count($blogs)==0)
       <h5 class="text-capitalize text-center mt-5">Hiện tại chưa có blog nào được tạo!</h5>
    @else
        <div class="card-group">
                @foreach($blogs as $key =>$blog)
                    <div class="card">
                        <img src="{{asset("storage/$blog->image")}}" class="card-img-top" alt="..."
                             style="width: 100%">
                        <div class="card-body">
                            <h5 class="card-title">Title: {{$blog->title}}</h5>
                            <p class="card-text">Content: {{$blog->content}}</p>
                            <p class="card-text">Author: {{$blog->author}}</p>
                            <p class="card-text">Date: {{$blog->due_date}}</p>
                            <p class="card-text">Category: {{$blog->category->name}}</p>
                        </div>
                    </div>
                @endforeach
        </div>
    @endif
    <div class="text-center">
        <a href="{{route('index')}}" class="btn btn-info "> << Back</a>
    </div>


@endsection