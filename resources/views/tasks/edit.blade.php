@extends('template')

@section('page')
    Task Edit
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="form-group">

                <div class="table-responsive">

                    {!! Form::model($task, ['method' => 'PATCH', 'url' => 'tasks/' . $task->id]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Task Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('completed', 'Completed %', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::selectRange('completed', 0, 100, null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('date', 'start_date', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('finish_date', 'Finish Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('date', 'finish_date', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('parent_task', 'Parent Task', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('parent_task', $tasks, old('parent_task'),['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('resources', 'Task Owner', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('task_owner', $resources, old('task_owner'),['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>

                <div>
                    {!! Form::submit('Add Task', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>



            </div>

            @include('error')

        </div>
    </div>


@stop
