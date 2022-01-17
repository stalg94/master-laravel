@extends('layouts.app')
@section('title', 'Blog posts')



@section('content')

    @forelse ($posts as $key => $post)
    @each('posts.partials.post',$posts , 'post' )
        @include('posts.partials.post')
    @empty
    No posts found!
    @endforelse

    <div>
        @for( $i=0; $i<10; $i++)
        <div> The current value is {{$i}}</div>

        @endfor
    </div>



@endsection
