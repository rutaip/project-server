@extends('master')

@section('content')

    <h1>Add a new comment</h1>

    </hr>

    {!! Form::open(array('url' => 'comments')) !!}

    {!! Form::hidden('project_id', $project_id) !!}
    {!! Form::hidden('user_id', $user_id) !!}

    <div class="from-group">

        {!! Form::label('title', 'Comments:') !!}
        {!! Form::textarea('comment', 'prueba', ['class' => 'form-control']) !!}

    </div>


    <div class="form-group">

        {!! Form::submit('Add Comments', ['class' => 'btn btn-primary form-control']) !!}

    </div>

    {!! Form::close() !!}

@stop
