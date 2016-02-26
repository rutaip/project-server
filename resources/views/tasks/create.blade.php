@extends('master')

@section('content')

    <h1>Add a new task</h1>

    </hr>

    {!! Form::open(array('url' => 'tasks')) !!}

    {!! Form::hidden('project_id', '1') !!}

    <div class="from-group">

        {!! Form::label('title', 'Titulo:') !!}
        {!! Form::text('title', 'prueba', ['class' => 'form-control']) !!}

    </div>

    <div class="from-group">

        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', 'esta es una prueba más grande', ['class' => 'form-control']) !!}

    </div>

 <!--   <div class="from-group">

        {!! Form::label('published_at', 'Published On:') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}

    </div>
-->
    <div class="form-group">

        {!! Form::submit('Add Task', ['class' => 'btn btn-primary form-control']) !!}

    </div>

    {!! Form::close() !!}

@stop
