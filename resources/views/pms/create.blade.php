@extends('template')

@section('page')
    Project Manager Create
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(array('url' => 'pms', 'class' => 'form-horizontal')) !!}

            <div class="form-group">
                {!! Form::label('first', 'First Name', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('first', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('last', 'Last Name', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('last', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('region_id', 'Region', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::select('region_id', $region, old('region_id'), ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('color', 'Color', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::input('color', 'color',  null, array('class' => 'form-control', 'required' => 'required')) !!}
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-6 col-md-offset-3">
                    {!! Form::submit('Add Project Manager', ['class' => 'col-md-4 btn btn-primary form-control']) !!}
                </div>
            </div>

            {!! Form::close() !!}

            @include('error')

        </div>
    </div>

@stop

