@extends('template')

@section('page')
    User Create
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                        {!! Form::open(array('url' => 'users', 'class' => 'form-horizontal', 'role' => 'form')) !!}

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
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
