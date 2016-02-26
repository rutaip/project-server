@extends('template')

@section('page')
    Project Managers
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../pms/create" class="btn btn-primary">New Project Manager</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">PM ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Region</td>
                <td>Color</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($pms as $pm)
                <tr height="40" align="center" >
                    <td>{{$pm->id}}</td>
                    <td>{{$pm->first}} {{$pm->last}}</td>
                    <td>{{$pm->email}}</td>
                    <td>{{$pm->region->region}}</td>

                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $pm->color }}" aria-hidden="true"></span></td>
                    @can('options')
                    <td>

                        {!! Form::model($pm, ['method' => 'DELETE', 'url' => 'pms/' . $pm->id, 'class' => 'btn-delete']) !!}
                        @can('edit')
                        <a href="{{ url('pms/' . $pm->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
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