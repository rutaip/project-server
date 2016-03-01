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