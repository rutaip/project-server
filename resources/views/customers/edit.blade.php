@extends('template')

@section('page')
    Customer Edit
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="form-group">

                <div class="table-responsive">

                    {!! Form::model($customer, ['method' => 'PATCH', 'url' => 'customers/' . $customer->id]) !!}

                    <table style="width:100%">
                        <tr style="height: 50px;">
                            <td align="center">{!! Form::label('customer_name', 'Customer Name') !!}</td>
                            <td>{!! Form::text('customer_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                            <td align="center">{!! Form::label('region_id', 'Region') !!}</td>
                            <td>{!! Form::select('region_id', $region, old('region_id')) !!}</td>

                        </tr>
                        <tr style="height: 20px;">
                            <td align="center">{!! Form::label('country', 'Customer Country') !!}</td>
                            <td>{!! Form::select('country', $countries, null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                            <td align="center">{!! Form::label('color', 'Color') !!}</td>
                            <td>{!! Form::input('color', 'color',  null, array('class' => 'form-control', 'required' => 'required')) !!}</td>

                        </tr>
                        <tr style="height: 20px;">
                            <td align="center">{!! Form::label('email', 'Customer Email') !!}</td>
                            <td>{!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2">{!! Form::submit('Edit Customer', ['class' => 'btn btn-primary form-control']) !!}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>


                    {!! Form::close() !!}
                </div>
            </div>

            @include('error')

        </div>
    </div>


@stop
