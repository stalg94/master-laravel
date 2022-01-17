
@if ($loop->even)
<div>{{$key}}.{{$post['title']}}</div>
@else
<div style="background-color:aqua">{{$key}}.{{$post['title']}}</div>
@endif
