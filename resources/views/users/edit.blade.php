@extends('template')

@section('page')
    User Edit
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                        {!! Form::model($user, ['method' => 'PATCH', 'url' => 'users/' . $user->id, 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'First Name', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('last', 'Last Name', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('last', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('region_id', 'Region', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {{ Form::select('region_id', $regions, null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {{ Form::select('role', $roles, null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
