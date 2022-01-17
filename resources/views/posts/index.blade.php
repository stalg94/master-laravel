@extends('layouts.app')
@section('title', 'Blog posts')



@section('content')

    @forelse ($posts as $key => $post)
    @if ($loop->even)
    <div>{{$key}}.{{$post['title']}}</div>
    @else
    <div style="background-color:aqua">{{$key}}.{{$post['title']}}</div>
    @endif

    @empty
    No posts found!
    @endforelse

    <div>
        @for( $i=0; $i<10; $i++)
        <div> The current value is {{$i}}</div>

        @endfor
    </div>



@endsection
