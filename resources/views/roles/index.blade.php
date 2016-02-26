@extends('template')

@section('page')
    Roles
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../roles/create" class="btn btn-primary">New Role</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Role ID</td>
                <td>Name</td>
                <td>Label</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($roles as $role)
                <tr height="40" align="center" >
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->label}}</td>
                    @can('options')
                    <td>
                        @if ($role->name === 'admin')

                        @else
                        {!! Form::model($role, ['method' => 'DELETE', 'url' => 'roles/' . $role->id, 'class' => 'btn-delete']) !!}
                        @can('edit')
                        <a href="{{ url('roles/' . $role->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
                        @endcan
                        <a href="{{ url('roles/' . $role->id) . '/permissions' }}" class="btn btn-success btn-xs">permissions</a>
                        @can('delete')
                        {!! Form::submit('delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        @endcan
                        {!! Form::close() !!}
                        @endif
                    </td>
                    @endcan
                </tr>

            @endforeach
        </table>
    </div>

@stop