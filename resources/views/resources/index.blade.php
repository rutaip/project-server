@extends('template')

@section('page')
    Resources
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../resources/create" class="btn btn-primary">New Resource</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Resource ID</td>
                <td>Resource</td>
                <td>Color</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($resources as $resource)
                <tr height="40" align="center" >
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->name}}</td>
                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $resource->color }}" aria-hidden="true"></span></td>
                    @can('options')
                    <td>

                        {!! Form::model($resource, ['method' => 'DELETE', 'url' => 'resources/' . $resource->id, 'class' => 'btn-delete']) !!}
                        @can('edit')
                        <a href="{{ url('resources/' . $resource->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
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