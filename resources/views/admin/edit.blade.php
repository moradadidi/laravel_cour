@extends("layout");
@section("content")
<div class="container mt-5">
    <h1>Edit Post</h1>    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group  mt-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group mt-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>
        </div>
        <div class="form-group mt-3">
            <label for="content">Author</label>
            <input type="text" name="author" id="title" class="form-control" value="{{ $post->author }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Post</button>