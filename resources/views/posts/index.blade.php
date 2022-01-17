@extends('layouts.app')
@section('title', 'Blog posts')



@section('content')

    @foreach ($posts as $key => $post)
    {{-- @each('posts.partials.post',$posts , 'post' ) --}}
        {{-- @include('posts.partials.post') --}}
        <div>{{$key}}.{{$post['title']}}</div>
        <div style="background-color:aqua">{{$key}}.{{$post['title']}}</div>

    @endforeach




@endsection
