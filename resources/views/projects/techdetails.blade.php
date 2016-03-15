<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-4">
            <h4>ACD Type = {{$project->acd_type->acd_type}}</h4>
        </div>
        <div class="col-md-4">
            <h4>Integrations = {{$project->integrations}}</h4>
        </div>
        <div class="col-md-4">
            <h4>Presence Integrations = {{$project->pre_integrations}}</h4>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-8">

            <h4>Campaing = {{$project->campaign}}</h4>

        </div>
        <div class="col-md-4">
            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#new_module">
                New License
            </button>

            <!-- Modal -->
            <div class="modal fade" id="new_module" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New License</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url' => 'projectlicenses', 'class' => 'form-horizontal')) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Presence Module', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('name', $modules, old('name'),['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('licenses', 'Qty.', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('licenses', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>

                            {{ Form::hidden('project_id', $project->id) }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::submit('Add License', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <caption>Project Licenses</caption>
            <thead>
            <tr class="active">
                <th>Pesence Module</th>
                <th>Qty.</th>
                @can('edit-project', $project)
                <th>Edit</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($project->licenses as $license)
                <tr>
                    <th scope="row">{{$license->name}}</th>
                    <td>{{$license->licenses}}</td>
                    @can('edit-project', $project)
                    <td><a href="{{ url('projectlicenses/' . $license->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered">
            <caption>Project Links</caption>
            <thead>
            <tr class="active">
                <th>Google Drive Link</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Html::link($project->gdrive_link, $project->gdrive_link) }}</td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
            <tr class="active">
                <th>Presence CRM Linkk</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Html::link($project->crm_link, $project->crm_link) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>