@extends('layouts.app')

<div><input type="text" name="title" value="{{old('title', optional($post ?? null)->title)}}"></div>
@error('title')
<div>{{$message}}</div>
@enderror
<div><textarea name="content" id="" cols="30" rows="10" >{{old('content', optional($post ?? null)->content)}}</textarea></div>
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
