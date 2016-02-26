@extends('template')

@section('page')
    Partner Create
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(array('url' => 'partners')) !!}

            <table style="width:100%">
                <tr style="height: 50px;">
                    <td align="center">{!! Form::label('partner_name', 'Partner Name') !!}</td>
                    <td>{!! Form::text('partner_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                    <td align="center">{!! Form::label('region_id', 'Region') !!}</td>
                    <td>{!! Form::select('region_id', $region, old('region_id')) !!}</td>

                </tr>
                <tr style="height: 20px;">
                    <td align="center">{!! Form::label('partner_country', 'Partner Country') !!}</td>
                    <td>{!! Form::text('partner_country', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                    <td align="center">{!! Form::label('color', 'Color') !!}</td>
                    <td>{!! Form::input('color', 'color',  null, array('class' => 'form-control', 'required' => 'required')) !!}</td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">{!! Form::submit('Add Partner', ['class' => 'btn btn-primary form-control']) !!}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>


            {!! Form::close() !!}

            @include('error')

        </div>
    </div>

@stop

