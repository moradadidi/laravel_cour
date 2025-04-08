@extends('layout')

@section('content')
<div class="container mx-auto mt-10 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>    
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6">
        @method('PATCH')
        @csrf
        <div class="flex flex-col">
            <label for="name" class="text-lg font-medium mb-2">Name</label>
            <input type="text" name="name" value="{{ $post->name }}" id="name" class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col">
            <label for="email" class="text-lg font-medium mb-2">Email</label>
            <input type="email" name="email" value="{{ $post->email }}" id="email" class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col">
            <label for="message" class="text-lg font-medium mb-2">Message</label>
            <textarea name="message" id="message" class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5">{{ $post->message }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-600 transition duration-200">Update Post</button>  
    </form>
</div>
@endsection
