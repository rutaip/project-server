
<!-- Pestaña Integrations-->
 <br>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>

        </div>
        <div class="col-md-6">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#new_integration">
                    New Integration
                </button>

                <!-- Modal -->
                <div class="modal fade" id="new_integration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">New integration</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array('url' => 'integrations', 'class' => 'form-horizontal')) !!}
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
                                {{ Form::hidden('integration_owner', $login->name.' '.$login->last) }}
                                {{ Form::hidden('project_id', $project->id) }}



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {!! Form::submit('Add Integration', ['class' => 'btn btn-primary']) !!}
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
        @foreach($project->pintegrations as $integration)
        <table class="table table-bordered">
            <caption>Integrations</caption>
            <thead>
            <tr class="active">
                <th>Date Created</th>
                <th>Date Update</th>
                <th>Name</th>
                <th>Developer</th>
                <th>Url</th>
                <th>Post Editor</th>

            </tr> </thead>
            <tbody>

                <tr>
                    <td>{{$integration->created_at}}</td>
                    <td>{{$integration->updated_at}}</td>
                    <td>{{$integration->name}}</td>

                    <td>{{$integration->developer}}</td>
                    <td>{{$integration->url}}</td>
                    <td>{{$integration->integration_owner}}</td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td colspan="5">{{$integration->information}}</td>
                </tr>

            </tbody>
        </table>
        @endforeach
    </div>
