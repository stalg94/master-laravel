
@extends('layouts.app')
@section('title', 'Update The Post')
@section('content')
<form action="{{route('posts.update', ['post' => $post->id])}}" method="POST">
    @csrf
    @method('PUT')
    @include('posts.partials.form')
    <div><input type="submit" value="Update" class="btn btn-primary btn-block m-3"></div>
</form>

@endsection
