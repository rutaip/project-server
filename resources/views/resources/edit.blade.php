@extends('template')

@section('page')
    Resource Edit
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="form-group">

                <div class="table-responsive">

                    {!! Form::model($resource, ['method' => 'PATCH', 'url' => 'resources/' . $resource->id]) !!}

                    <table style="width:100%">
                        <tr style="height: 50px;">
                            <td align="center">{!! Form::label('name', 'Resource Name') !!}</td>
                            <td>{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>


                        </tr>
                        <tr style="height: 20px;">
                           <td align="center">{!! Form::label('color', 'Color') !!}</td>
                            <td>{!! Form::input('color', 'color',  null, array('class' => 'form-control', 'required' => 'required')) !!}</td>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2">{!! Form::submit('Edit Resource', ['class' => 'btn btn-primary form-control']) !!}</td>
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
