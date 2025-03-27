@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Create Post</h1>    
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <textarea name="author" id="author" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>  
    </form>
</div>
@endsection
