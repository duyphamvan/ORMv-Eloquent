@extends('home')
@section('title','Bai Viet Chi Tiet')
@section('content')
<div class="row">
    <div class="col-sm-12 text-center mt-5">
        <img src="{{asset("storage/$blog->image")}}" alt="" height="300px" width="400px">
        <h2>Title: {{$blog->title}}</h2>
        <p>Content: {{$blog->content}}</p>
        <p>Author: {{$blog->author}}</p>
        <p>Date: {{$blog->due_date}}</p>
        <p>Category: {{$blog->category->name}}</p>

    </div>
</div>

@endsection