<!-- Modal -->
<div class="modal fade" id="change_owner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Project Owner</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($project, ['method' => 'PATCH', 'action' => ['ProjectsController@update', $project->id]]) !!}
                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::select('user_id', $owners, old('user_id'),['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-4">
            <h4>General Status = {{$project->master_status}}</h4>
        </div>
        <div class="col-md-4">
            <h4>Type =
                @if ($project->project_type_id == 1)
                    Pilot
                @else
                    Project
                @endif
            </h4>
        </div>
        <div class="col-md-4">
            <h4>
                Implementation Type = {{$project->imp_type }}
            </h4>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-4">
            <a href="#tasks" class="btn btn-default btn-block" aria-controls="settings" role="tab" data-toggle="tab"> Tasks <span class="badge">{{count($project->tasks)}}</span></a>
        </div>
        <div class="col-md-4">
            <a href="#settings" class="btn btn-default btn-block" aria-controls="settings" role="tab" data-toggle="tab">Comments <span class="badge">{{ $comments_count }}</span></a>

        </div>
        <div class="col-md-4">
            @can('edit-project', $project)
            <a href="../projects/{{ $project->id }}/edit" class="btn btn-default btn-block">Update</a>
            @endcan
            @can('admin', $project)
                    <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#change_owner">
                        Change Owner
                    </button>
            @endcan
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <caption>Project Description</caption>
            <thead>
                <tr>
                    <td>{{$project->description}}</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>

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
                    <td>{!! Html::image($progress_dot, $progress_dot_alt, array( 'width' => 20, 'height' => 20 )) !!} {{$project->status}}</td>
            </tr>
            <tr>
                <th scope=row>Customer</th>
                <td>{{$project->customer->customer_name}}</td>
            </tr>
            <tr>
                <th scope=row>Region / Country</th>
                <td>{{$project->region->region}} / {{$project->country}}</td>
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

                    <div class="progress-bar  {{$progress_bar}} progress-bar-striped" role="progressbar" aria-valuenow="{{round($tasks_sum/count($project->tasks))}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round($tasks_sum/count($project->tasks))}}%;">
                        {{round($tasks_sum/count($project->tasks))}}%
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