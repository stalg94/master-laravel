<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Http\Requests\StorePost;

class PostController extends Controller
{

    private $posts=[
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    return view('posts.index',
    //compact($posts) == ['posts' => $posts]
    [
        'posts' =>BlogPost::all(),
    ]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //
        $validated = $request->validated();
        // $post = new BlogPost();
        // // $post->title = $request->input('title');
        // $post->title = $validated['title'];
        // // $post->content = $request->input('content');
        // $post->content = $validated['content'];
        // $post->save();

        $post = BlogPost::create($validated);


        $request->session()->flash('status', 'Blog Post was created');

        return redirect()->route('posts.show',[
            'post' => $post->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    // abort_if(!isset($this->posts[$id]), 404);

    return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
