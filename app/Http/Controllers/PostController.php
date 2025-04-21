<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


    public function index() {
        $posts = Post::query()->paginate(5);
        return view('posts.index' , compact('posts'));
    }


    public function show(Post $post) {
        return view('posts.show', compact('post')); 
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
            $post = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ]);
            Post::create($post);
            return redirect()->route('posts.index');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->message = $request->message;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function search(Request $request) {
        $searchTerm = $request->search;
        $posts = Post::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('message', 'like', '%' . $searchTerm . '%');
        })->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }
}  
