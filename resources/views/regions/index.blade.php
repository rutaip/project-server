@extends('template')

@section('page')
    {{ $controller_action  }}
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../regions/create" class="btn btn-primary">New Region</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Region ID</td>
                <td>Name</td>
                <td>Color</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($regions as $region)
                <tr height="40" align="center" >
                    <td>{{$region->id}}</td>
                    <td>{{$region->region}}</td>
                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $region->color }}" aria-hidden="true"></span></td>
                    @can('options')
                    <td>

                        {!! Form::model($region, ['method' => 'DELETE', 'url' => 'regions/' . $region->id, 'class' => 'btn-delete']) !!}

                        @can('edit')

                        <a href="{{ url('regions/' . $region->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>

                        @endcan

                        @can('delete')
                        {!! Form::submit('delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        @endcan
                        {!! Form::close() !!}

                    </td>
                    @endcan
                </tr>

            @endforeach
        </table>
    </div>

@stop