<?php

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

// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// Route::get('/contact', function () {
//     return 'home.contact';
// })->name('home.contact');

Route::get('/post/{id}', function ($id) {
    $posts=[
        1 =>[
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new'=> true,
            'has_comments' => true,
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new'=> false,


        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})
// ->where([
//     'id' => '[0-9]+'
// ])
->name('posts.show');

$posts=[
    1 =>[
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new'=> true,
        'has_comments' => true,
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new'=> false,
    ],
    3 => [
        'title' => 'Intro to JS',
        'content' => 'This is a short intro to JS',
        'is_new'=> false,
    ],

];

Route::get('/posts', function() use ($posts){
    return view('posts.index',
    //cvompact($posts) == ['posts' => $posts]
    [
        'posts' =>$posts,
    ]);
});

Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

Route::get('recent-posts/{days_ago?}',function($days_ago = 20){
    return 'Posts from '.$days_ago . ' days ago';
})->name('posts.recent.index');


