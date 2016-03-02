@extends('template')

@section('page')
    License Edit
@stop

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="form-group">

                <div class="table-responsive">

                    {!! Form::model($integration, ['method' => 'PATCH', 'url' => 'integrations/' . $integration->id]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('information', 'Integration Details', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('information', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('developer', 'Developer', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('developer', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'Documentation URL/Path', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('url', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>


                    <div>
                        {{ Form::hidden('integration_owner', $integration->integration_owner) }}
                        {{ Form::hidden('project_id', $integration->project_id) }}
                        {!! Form::submit('Add Integration', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            @include('error')

        </div>
    </div>


@stop
