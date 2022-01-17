<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// Route::get('/contact', function () {
//     return 'home.contact';
// })->name('home.contact');

// Route::get('/post/{id}', function ($id) {
//     $posts=[
//         1 =>[
//             'title' => 'Intro to Laravel',
//             'content' => 'This is a short intro to Laravel',
//             'is_new'=> true,
//             'has_comments' => true,
//         ],
//         2 => [
//             'title' => 'Intro to PHP',
//             'content' => 'This is a short intro to PHP',
//             'is_new'=> false,


//         ]
//     ];

//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id]]);
// })
// // ->where([
// //     'id' => '[0-9]+'
// // ])
// ->name('posts.show');

// $posts=[
//     1 =>[
//         'title' => 'Intro to Laravel',
//         'content' => 'This is a short intro to Laravel',
//         'is_new'=> true,
//         'has_comments' => true,
//     ],
//     2 => [
//         'title' => 'Intro to PHP',
//         'content' => 'This is a short intro to PHP',
//         'is_new'=> false,
//     ],
//     3 => [
//         'title' => 'Intro to JS',
//         'content' => 'This is a short intro to JS',
//         'is_new'=> false,
//     ],

// ];

// Route::get('/posts', function() use ($posts){
//     // dd(request()->all());
//     dd(request()->input('page', 1));
//     return view('posts.index',
//     //compact($posts) == ['posts' => $posts]
//     [
//         'posts' =>$posts,
//     ]);
// });

// Route::view('/', 'home.index')->name('home.index');
Route::get('/', [HomeController::class, 'home'])->name('home.index');
// Route::view('/contact', 'home.contact')->name('home.contact');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class);

// Route::get('recent-posts/{days_ago?}',function($days_ago = 20){
//     return 'Posts from '.$days_ago . ' days ago';
// })->name('posts.recent.index')->middleware('auth');

// Route::prefix('/fun')->name('fun.')->group(function() use($posts){
// Route::get('/responses', function() use($posts){
//     return response($posts, 201)
//     ->header('Content-Type', 'application/json')
//     ->cookie('MY_COOKIE', 'Stas ALeksejevski', 3600);
// });

// Route::get('/redirect', function(){
//     return redirect('/contact');
// });
// Route::get('/back', function(){
//     return back();
// });
// Route::get('/named-route', function(){
//     return redirect()->route('posts.show', ['id' => 1]);
// });
// Route::get('/away', function(){
//     return redirect()->away('https://google.com');
// });
// Route::get('/json', function() use($posts){
//     return response()->json($posts);
// });
// Route::get('/download', function() use($posts){
//     return response()->download(public_path('/daniel.jpg'), 'face.jpg');
// });
// });

Route::resource('posts', PostController::class)->only(['index', 'show']);
// Route::resource('posts', PostController::class)->except(['index', 'show']);


