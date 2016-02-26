@extends('template')

@section('page')
    ACD Create
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(array('url' => 'acds', 'class' => 'form-horizontal')) !!}

            <div class="form-group">
                {!! Form::label('acd_type', 'ACD Type', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">

                    {{ Form::select('acd_type', [
                       'Avaya' => 'Avaya',
                       'Opengate' => 'Opengate'],
                       null, ['class' => 'form-control', 'required' => 'required']
                    ) }}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('version', 'Presence version', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('version', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
                    {!! Form::submit('Add ACD', ['class' => 'col-md-4 btn btn-primary form-control']) !!}
                </div>
            </div>

            {!! Form::close() !!}

            @include('error')

        </div>
    </div>

@stop

