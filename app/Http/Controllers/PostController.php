<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


    public function index() {
        // $posts=Post::all();
        $posts=DB::select('select * from posts');
        // Convert stdClass objects to an array
        $postsArr = Collection::make(json_decode(json_encode($posts), true));
        // dd($postsArr);
        return view('posts.index' , compact('postsArr'));
    }

    public function show(   $id) {
        $post = Post::findOrFail($id);
        // $samePosts = DB::select('select * where id = ');
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
            DB::insert("insert into posts (name,email,message ) values (?, ?, ?)", [$post['name'], $post['email'], $post['message']]);
            // dd($post);
            // Post::create($post);
           
            return redirect()->route('posts.index');
    }

    public function edit($id) {
        $post = DB::select('select * from posts where id = ?',[$id])[0];
        // dd($post->id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        DB::update('update posts  set name = ?, email = ?, message = ? where id = ?', [ $request->name, $request->email, $request->message,$id]);
        return redirect()->route('posts.index');
    }
    public function destroy($id) {
        // $post = Post::findOrFail($id);
        // $post->delete();
        DB::delete('delete from posts where id = ?', [$id]);
        return redirect()->route('posts.index');
    }
}  
