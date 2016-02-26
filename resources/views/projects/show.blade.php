@extends('template')

@section('page')

    <div class="row">
        <div class="col-md-6">
            <h3>Project {{ $project->project_name }}</h3>
        </div>
        <div class="col-md-6">

        </div>
    </div>
@stop

@section('content')

    <script>
        $(function () {
            $('#home a').click(function (e) {
                e.preventDefault();
                $('a[href="' + $(this).attr('href') + '"]').tab('show');
            })
        });
    </script>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Project</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Costs</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tech Details</a></li>
            <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Project Task</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Comments</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Primera pestaña General -->
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h4>General Status = {{$project->master_status}}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Type =
                                @if ($project->project_type_id == 1)
                                    Pilot
                                @else
                                    Project
                                @endif
                            </h4>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <button class="btn btn-default btn-block" type="button">
                                Tasks <span class="badge">4</span>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <a href="#settings" class="btn btn-default btn-block" aria-controls="settings" role="tab" data-toggle="tab">Comments <span class="badge">{{ $comments_count }}</span></a>

                        </div>
                        <div class="col-md-4">
                            @can('edit-project', $project)
                            <a href="../projects/{{ $project->id }}/edit" class="btn btn-default btn-block">Update</a>
                            @endcan
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <caption>General Information</caption>
                            <thead>
                            <tr class="active">
                                <th>Item</th>
                                <th>Status</th>
                            </tr> </thead>
                            <tbody>
                            <tr>
                                <th scope=row>Status</th>
                                @if ($project->status == "On_Time")
                                    <td>{!! Html::image('images/green.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @elseif($project->status == "Delayed")
                                    <td>{!! Html::image('images/yellow.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @elseif($project->status == "Risk")
                                    <td>{!! Html::image('images/red.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @elseif($project->status == "Pending")
                                    <td>{!! Html::image('images/light_blue.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @elseif($project->status == "Production")
                                    <td>{!! Html::image('images/orange.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @elseif($project->status == "Pilot")
                                    <td>{!! Html::image('images/blue.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @else
                                    <td>{!! Html::image('images/grey.png', 'On Time', array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope=row>Customer</th>
                                <td>{{$project->customer->customer_name}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Region</th>
                                <td>{{$project->region->region}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Presence PM</th>
                                <td>{{$project->pm->first}} {{$project->pm->last}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Partner</th>
                                <td>{{$project->partner->partner_name}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Support Partner</th>
                                <td>{{$project->support_partner->partner_name}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-responsive col-md-6">
                            <caption>Dates & Progress</caption>
                            <thead>
                            <tr class="active">
                                <th>Item</th>
                                <th>Status</th>
                            </tr> </thead>
                            <tbody>
                            <tr>
                                <th scope=row>Progress</th>
                                <td>

                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                            80%
                                        </div>

                                </td>
                            </tr>
                            <tr>
                                <th scope=row>Original Date</th>
                                <td>{{$project->original_date}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Expected Date</th>
                                <td>{{$project->expected_date}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Real Delivery Date</th>
                                <td>{{$project->delivery_date}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Days Contracted</th>
                                <td>{{$project->days_contracted}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Days Spent</th>
                                <td>{{$project->days_spent}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Fin Primera pestaña General -->

            <!-- Pestaña Costos -->

            <div role="tabpanel" class="tab-pane fade" id="profile">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h4>Billing Pending = {{$project->amount_pending}}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Cost Project MO {{$project->cost_project_mo}}</h4>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-default btn-block" type="button">
                                Update
                            </button>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <caption>USD Values</caption>
                            <thead>
                            <tr class="active">
                                <th>Item</th>
                                <th>Status</th>
                            </tr> </thead>
                            <tbody>
                            <tr>
                                <th scope=row>Amount (€)</th>
                                <td>{{$project->amount_eur}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Travel Expenses Reported (€)</th>
                                <td>{{$project->expenses_reported_eur}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Travel Expenses Reported not billable(€)</th>
                                <td>{{$project->not_expenses_reported_eur}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-responsive col-md-6">
                            <caption>Euro Values</caption>
                            <thead>
                            <tr class="active">
                                <th>Item</th>
                                <th>Status</th>
                            </tr> </thead>
                            <tbody>
                            <tr>
                                <th scope=row>Amount ($)</th>
                                <td>{{$project->amount_usd}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Travel Expenses Reported ($)</th>
                                <td>{{$project->expenses_reported_usd}}</td>
                            </tr>
                            <tr>
                                <th scope=row>Travel Expenses Reported not billable($)</th>
                                <td>{{$project->not_expenses_reported_usd}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Fin Pestaña Costos -->

            <!-- Pestaña Tech Requ -->
            <div role="tabpanel" class="tab-pane fade" id="messages">

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
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                            </tr> </thead>
                            <tbody>
                            @foreach($project->licenses as $license)
                                <tr>
                                    <th scope="row">{{$license->name}}</th>
                                    <td>{{$license->licenses}}</td>
                                    @can('edit-project', $project)
                                    <td><a href="{{ url('projectlicenses/' . $license->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a></td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>

            <!-- Pestaña Comentarios -->

            <div role="tabpanel" class="tab-pane fade" id="settings">
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
                            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#new_comment">
                                New Comment
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="new_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">New comment</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(array('url' => 'comments', 'class' => 'form-horizontal')) !!}
                                            <div class="form-group">
                                                {!! Form::label('comment_text', 'Comment', ['class' => 'col-md-4 control-label']) !!}
                                                <div class="col-md-6">
                                                    {!! Form::textarea('comment_text', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                                </div>
                                            </div>
                                            {{ Form::hidden('comment_owner', $login->name.' '.$login->last) }}
                                            {{ Form::hidden('project_id', $project->id) }}



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            {!! Form::submit('Add Comment', ['class' => 'btn btn-primary']) !!}
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
                        <table class="table table-bordered">
                            <caption>Project Updates</caption>
                            <thead>
                            <tr class="active">
                                <th>Date Created</th>
                                <th>Date Update</th>
                                <th>User</th>
                                <th>Comments</th>
                            </tr> </thead>
                            <tbody>
                            @foreach($project->comments as $comment)
                                <tr>
                                    <td>{{$comment->created_at}}</td>
                                    <td>{{$comment->updated_at}}</td>
                                    <td>{{$comment->comment_owner}}</td>
                                    <td>{{$comment->comment_text}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>


            <!-- pestaña tareas-->
            <div role="tabpanel" class="tab-pane fade" id="tasks">

            </div>
            <!-- fin pestaña tareas -->

        </div>

    </div>



@stop
