@extends('template')

@section('page')
    Presence Modules
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../modules/create" class="btn btn-primary">New Module</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Module ID</td>
                <td>Name</td>
                <td>Color</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($modules as $module)
                <tr height="40" align="center" >
                    <td>{{$module->id}}</td>
                    <td>{{$module->name}}</td>
                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $module->color }}" aria-hidden="true"></span></td>
                    @can('options')
                    <td>

                        {!! Form::model($module, ['method' => 'DELETE', 'url' => 'modules/' . $module->id, 'class' => 'btn-delete']) !!}

                        @can('edit')

                        <a href="{{ url('modules/' . $module->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>

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