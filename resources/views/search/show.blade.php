@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-10">
            Projects with tag {{$tag}}
        </div>
        <div class="col-md-2">
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
            <th>Country</th>
            <th>Project Manager</th>
            <th>ACD Type</th>
            <th>Status </th>
        </tr>
        </thead>
        <tbody>

        @foreach($projects as $project)
            <tr>
                <th>{{ Html::link('/projects/'.$project->id, $project->project_name)}}</th>
                <td>{{$project->customer->customer_name}}</td>
                <td>{{$project->partner->partner_name}}</td>
                <td>{{$project->support_partner->partner_name}}</td>
                <td>{{$project->region->region}}</td>
                <td>{{$project->country}}</td>
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
            </tr>

        @endforeach

        </tbody>
    </table>

@stop