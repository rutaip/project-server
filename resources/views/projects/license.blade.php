@extends('template')

@section('page')
    License Edit
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="form-group">

                <div class="table-responsive">

                    {!! Form::model($license, ['method' => 'PATCH', 'url' => 'projectlicenses/' . $license->id]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Presence Module', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('name', $modules, old('name'),['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('licenses', 'Qty.', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('licenses', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    {{ Form::hidden('project_id', $license->project_id) }}
                    {!! Form::submit('Add License', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

            @include('error')

        </div>
    </div>


@stop
