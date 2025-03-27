@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $posts = [
                    ['id' => 1, 'title' => 'First Post', 'content' => 'Content of the first post'],
                    ['id' => 2, 'title' => 'Second Post', 'content' => 'Content of the second post'],
                    ['id' => 3, 'title' => 'Third Post', 'content' => 'Content of the third post'],
                ];
            @endphp
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['content'] }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection