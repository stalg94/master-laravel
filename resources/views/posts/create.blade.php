@extends('layouts.app')
@section('title', 'Create The Post')
@section('content')
<form action="{{route('posts.store')}}" method="POST">
    @csrf
    <div><input type="text" name="title" value="{{old('title')}}"></div>
    @error('title')
    <div>{{$message}}</div>
    @enderror
    <div><textarea name="content" id="" cols="30" rows="10" >{{old('content')}}</textarea></div>
    @error('content')
    <div>{{$message}}</div>
    @enderror

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div><input type="submit" value="Create"></div>
</form>

@endsection
