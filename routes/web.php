<?php
namespace App;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $users  = User::get();
    return view('welcome', compact('users'));
});

Route::get('/profile/{id}', function ($id) {
    $user   = User::find($id);


    $posts  = $user->posts()
                    // traemos tambien los datos asi evitamos hacer las consultas desde la vista.
                    ->with('category', 'image', 'tags')
                    // queremos que tome en cuenta los comentarios tambien.
                    ->withCount('comments')->get();

    // queremos que tome en cuenta los comentarios tambien.
    $videos = $user->videos()
                    // traemos tambien los datos asi evitamos hacer las consultas desde la vista.
                    ->with('category', 'image', 'tags')
                    // queremos que tome en cuenta los comentarios tambien.
                    ->withCount('comments')->get();

    return view('user.profile', compact('user', 'posts', 'videos'));
})->name('user.profile');

Route::get('/level/{name}', function ($name) {
    $level  = Level::where('name', $name)->firstOrFail();
    dd($level);
    $posts  = $level->posts()
                    // traemos tambien los datos asi evitamos hacer las consultas desde la vista.
                    ->with('category', 'image', 'tags')
                    // queremos que tome en cuenta los comentarios tambien.
                    ->withCount('comments')->get();

    // queremos que tome en cuenta los comentarios tambien.
    $videos = $level->videos()
                    // traemos tambien los datos asi evitamos hacer las consultas desde la vista.
                    ->with('category', 'image', 'tags')
                    // queremos que tome en cuenta los comentarios tambien.
                    ->withCount('comments')->get();

    return view('level', compact('level', 'posts', 'videos'));
})->name('level');
