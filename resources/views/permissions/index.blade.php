@extends('template')

@section('page')
    Permissions
@stop

@section('content')


    <div class="row">
        @can('admin')
        <div class="col-md-2 pull-right"><a href="../permissions/create" class="btn btn-primary">New Permission</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Permission ID</td>
                <td>Name</td>
                <td>Label</td>
            </tr>

            @foreach($permissions as $permission)
                <tr height="40" align="center" >
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->label}}</td>
                </tr>

            @endforeach
        </table>
    </div>

@stop