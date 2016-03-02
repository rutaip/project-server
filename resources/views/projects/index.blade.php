@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-10">
            General Status
        </div>
        <div class="col-md-2">
            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#filters">
                Filters
            </button>
        </div>

    </div>
@stop

@section('content')


    <table class="table table-bordered">
        <caption>Project Summary</caption>
        <thead>
            <tr class="active">
                <th>Project</th>
                <th>Customer</th>
                <th>Imp. Partner</th>
                <th>Support Partner</th>
                <th>Region</th>
                <th>Project Manager</th>
                <th>ACD Type</th>
                <th>Status </th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>

        @foreach($projects as $project)
            <tr>
                <th>{{$project->project_name}}</th>
                <td>{{$project->customer->customer_name}}</td>
                <td>{{$project->partner->partner_name}}</td>
                <td>{{$project->support_partner->partner_name}}</td>
                <td>{{$project->region->region}}</td>
                <td>{{$project->pm->first}} {{$project->pm->last}}</td>
                <td>{{$project->acd_type->acd_type}}</td>


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

                <td style="text-align: center"><a href="{{ $project->id }}"> more.. </a></td>
            </tr>

        @endforeach

        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="filters" tabindex="-1" role="dialog" aria-labelledby="filters">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Options</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('url' => 'projects/search', 'class' => 'form-horizontal')) !!}
                    <div class="form-group">
                        {!! Form::label('region_id', 'Regions', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('region_id[]', $region, null,['class' => 'form-control', 'multiple' => 'true', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('master_status', 'Status', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('master_status[]', array('Working' => 'Working', 'StandBy' => 'Stand By', 'Offerings' => 'Offerings', 'Finished' => 'Finished'), null, ['class' => 'form-control', 'multiple' => 'true', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Filter', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop