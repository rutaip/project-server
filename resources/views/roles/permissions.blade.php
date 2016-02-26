@extends('template')

@section('page')
    Role {{ $role->label }} Permission
@stop

@section('content')


    <div class="row col-md-6 pull-right">
        {!! Form::open(array('url' => 'roles/role_permissions')) !!}
        <div class="col-md-6">
            {{ Form::select('permission', $permissions, null, ['class' => 'form-control']) }}
            {{ Form::hidden('role_id', $role->id) }}
        </div>
        <div class="col-md-6">
            {!! Form::submit('New Permission', ['class' => 'btn btn-primary btn-xs form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <br>
    <br>
    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Role ID</td>
                <td>Name</td>
                <td>Label</td>
            </tr>

            @foreach($role->permissions as $permission)
                <tr height="40" align="center" >
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->label}}</td>
                </tr>

            @endforeach
        </table>
    </div>

@stop