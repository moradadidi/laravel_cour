@extends('layout')

@section('content')
    <div class="bg-gray-900 text-white min-h-screen p-6">
        <h1 class="text-3xl font-bold mb-6">Post Details</h1>
        <div class="bg-gray-800 p-4 rounded-lg shadow-md">
            <p class="mb-2"><span class="font-semibold">Title:</span> {{ $post->name }}</p>
            <p class="mb-2"><span class="font-semibold">Content:</span> {{ $post->email }}</p>
            <p class="mb-2"><span class="font-semibold">Author:</span> {{ $post->message }}</p>
            <p class="mb-2"><span class="font-semibold">Created At:</span> {{ $post->created_at }}</p>
            <p class="mb-4"><span class="font-semibold">Updated At:</span> {{ $post->updated_at }}</p>
            <div class="flex space-x-4">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Edit Post</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')    
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
