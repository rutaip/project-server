@extends('master')

@section('content')

    <h1>{{ $task->title }}</h1>

    <task>

        {{ $task->body }}

    </task>


@stop