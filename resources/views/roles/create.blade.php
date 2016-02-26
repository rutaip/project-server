@extends('template')

@section('page')
    New Role
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(array('url' => 'roles')) !!}

            <table style="width:100%">
                <tr style="height: 50px;">
                    <td align="center">{!! Form::label('name', 'Name') !!}</td>
                    <td>{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                    <td align="center">{!! Form::label('color', 'Color') !!}</td>
                    <td>{!! Form::input('color', 'color',  null, array('class' => 'form-control', 'required' => 'required')) !!}</td>
                </tr>
                <tr style="height: 20px;">
                    <td align="center">{!! Form::label('label', 'Label') !!}</td>
                    <td>{!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">{!! Form::submit('Add Role', ['class' => 'btn btn-primary form-control']) !!}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>


            {!! Form::close() !!}

            @include('error')

        </div>
    </div>

@stop

