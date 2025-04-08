@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">All Posts</h1>
        <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Post</a>
    </div>
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($postsArr as $post)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900  dark:hover:text-black">
                        <td class="px-6 py-4 text-sm dark:text-gray-300 ">{{ $post['id'] }}</td>
                        <td class="px-6 py-4 text-sm dark:text-gray-300 ">{{ $post['name'] }}</td>
                        <td class="px-6 py-4 text-sm dark:text-gray-300 ">{{ $post['email'] }}</td>
                        <td class="px-6 py-4 text-sm dark:text-gray-300 ">{{ $post['message'] }}</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('posts.edit', $post['id']) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" class="inline-block" onsubmit="return confirm('Do you really want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-400 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection