<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormDataController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil');
Route::get('/home', function() {
    return "bonjour Laravel ";
});

 
// Route::get('/users', [UserController::class, 'index']);
// Route::get("/user/{id}", [UserController::class, 'show']);

// Route::get("/user/{id?}", function($id = null) {
//     return "Bonjour $id";
// });

Route::get('/admin', function() {
    return view('admin');
})->middleware('CheckRole:admin');

Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

route::resource('posts', PostController::class);

Route::resource('stagiaires' , StagiaireController::class);

// Route::get('/view', function() {
//     return view('accueil');
// });

// Route::get('/home/{name}/{age?}', function($name, $age = null) {
//     if ($age) {
//         return "Bonjour $name, votre âge est $age ans";
//     } else {
//         return "Bonjour $name";
//     }
// });


// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard');
//     })->name('admin.dashboard');

//     Route::get('/admin/users', function () {
//         return view('users');
//     })->name('admin.users');

//     Route::get('/admin/settings', function () {
//         return view('settings');
//     })->name('admin.settings');
// });

// Route::resource('posts', PostController::class);


// Route::get('/accueil', function () {
//     return view('accueil');
// })->middleware('age');

// Route::get('/contact', function () {
//     return view('contact');
// })->middleware('user');

// Route::get('/test', function () {
//     return view('test');
// })->middleware('test');


// Route::post('/data', [FormDataController::class, 'store'])->name('data');

// Route::get('/form' , function() {
//     return view('form');
// });

// Route::get('/csrf-token', function() {
//     return csrf_token();
// });

// Route::post('/profile/update', function (\Illuminate\Http\Request $request) {
//     $name = $request->input('name');
//     $email = $request->input('email');
    
//     return "Nom : $name, Email : $email";
// })->name('profile.update');


// Route::get('/profile', function () {
//     return view('profile');
// });



// Route::get('/one',[BaseController::class,'oneMethode'])->name('oneMethode')->middleware('OneMiddleware');
// Route::get('/two',[BaseController::class,'twoMethode'])->name('twoMethode')->middleware('TwoMiddleware',"TwoMiddleware");
// Route::get('/three',[BaseController::class,'threeMethode'])->name('threeMethode')->middleware('ThreeMiddleware');


// Route::get("/oneAction", [InvokeController::class, '__invoke'])->name('oneAction');

// Route::resource("/MaRessource" , RessourceController::class);

