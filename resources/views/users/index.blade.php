@extends('template')

@section('page')
    Users
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../users/create" class="btn btn-primary">New User</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">

                <td>Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Region</td>
                <td>Role</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($users as $user)
                <tr height="40" align="center" >

                    <td>{{$user->name}}</td>
                    <td>{{$user->last}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->region->region}}</td>
                    <td>{{$user->role->label}}</td>
                    @can('options')
                    <td>

                        {!! Form::model($user, ['method' => 'DELETE', 'url' => 'users/' . $user->id, 'class' => 'btn-delete']) !!}
                        @can('edit')
                            <a href="{{ url('users/' . $user->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
                        @endcan
                        @can('delete')
                        @if ($user->email === 'project@presenceco.com' )

                        @else
                            {!! Form::submit('delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        @endif
                        {!! Form::close() !!}
                        @endcan
                    </td>
                    @endcan
                </tr>

            @endforeach
        </table>
    </div>

@stop