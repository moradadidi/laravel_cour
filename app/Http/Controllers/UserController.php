<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        dd(User::all());
        return view('user.index');
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        //
    }

    public function show(?string $id) {
        
        $user = User::find($id);
        if(!$user) {
            abort(403, 'Unauthorized action.');
        }
        // dd($user);

        if($user->role === 'admin') {
            return view('admin.dashboard', compact('user'));

        }elseif($user->role === 'user') {
            return view('user.profile', compact('user'));
        }
    }

    
}
