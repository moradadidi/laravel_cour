<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Post;

// class PostController extends Controller
// {


//     public function index() {
//         $posts=Post::all();
//         return view('posts.index' , compact('posts'));
//     }

//     public function show(   $id) {
//         $post = Post::findOrFail($id);
//         return view('posts.show', compact('post'));
//     }

//     public function create() {
//         return view('posts.create');
//     }

//     public function store(Request $request) {
//             $post = $request->validate([
//                 'name' => 'required',
//                 'email' => 'required',
//                 'message' => 'required',
//             ]);
//             Post::create($post);
//             return redirect()->route('posts.index');
//     }

//     public function edit($id) {
//         $post = Post::findOrFail($id);
//         return view('posts.edit', compact('post'));
//     }

//     public function update(Request $request, $id) {
//         $post = Post::findOrFail($id);
//         $post->name = $request->name;
//         $post->email = $request->email;
//         $post->message = $request->message;
//         $post->save();
//         return redirect()->route('posts.index');
//     }
//     public function destroy($id) {
//         $post = Post::findOrFail($id);
//         $post->delete();
//         return redirect()->route('posts.index');
//     }
// }  


// <?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request) {   
        $searchTerm = $request->input('search');
        $posts = DB::table('posts')
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('email', 'like', '%' . $searchTerm . '%')
                      ->orWhere('message', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(5); 
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = DB::table('posts')->where('id', $id)->first();
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
        $post['created_at'] = now();
        $post['updated_at'] = now();
        DB::table('posts')->insert($post);
        return redirect()->route('posts.index');
    }

    public function edit($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        DB::table('posts')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy($id) {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('posts.index');
    }

    // public function search(Request $request) {
    //     $searchTerm = $request->input('search');
    //     $posts = DB::table('posts')
    //         ->where(function ($query) use ($searchTerm) {
    //             $query->where('name', 'like', '%' . $searchTerm . '%')
    //                   ->orWhere('email', 'like', '%' . $searchTerm . '%')
    //                   ->orWhere('message', 'like', '%' . $searchTerm . '%');
    //         })
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    //     return view('posts.index', compact('posts'));
    // }
}
