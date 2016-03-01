@extends('master')

@section('page')
    Comments
@stop

@section('content')
    <table width="100%">
            <tr><td>Comment</td><td>User</td><td>Date</td><td>Details</td></tr>

        @foreach($comments as $comment)

            <tr height="40"><td>{{$comment->comment}}</td><td>{{$comment->user_id}}</td><td>{{$comment->created_at}}</td><td><a href="comments/{{ $comment->id }}"> ver detalle </a></td></tr>

        @endforeach
    </table> 

@stop
