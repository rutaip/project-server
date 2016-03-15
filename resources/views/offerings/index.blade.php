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
        <caption>Offering Summary</caption>
        <thead>
            <tr class="active">
                <th>Offering</th>
                <th>Customer</th>
                <th>Imp. Partner</th>
                <th>Region</th>
                <th>Country</th>
                <th>Project Manager</th>
                <th>ACD Type</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody>

        @foreach($offerings as $offering)
            <tr>
                <th>{{ Html::link('/offerings/'.$offering->id, $offering->project_name)}}</th>
                <td>{{$offering->customer->customer_name}}</td>
                <td>{{$offering->partner->partner_name}}</td>
                <td>{{$offering->region->region}}</td>
                <td>{{$offering->country}}</td>
                <td>{{$offering->pm->first}} {{$offering->pm->last}}</td>
                <td>{{$offering->acd_type->acd_type}}</td>
                <td>{{$offering->master_status}}</td>

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
                    {!! Form::open(array('url' => 'offerings/filter', 'class' => 'form-horizontal')) !!}
                    <div class="form-group">
                        {!! Form::label('region_id', 'Regions', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('region_id[]', $region, null,['class' => 'form-control', 'multiple' => 'true', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('master_status', 'Status', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('master_status[]',
                            array(
                                'creating' => 'Creating Scope',
                                'accepted' => 'Accepted',
                                'cancelled' => 'Cancelled',
                                'canceled_off' => 'Cancelled before scope ready',
                                'offering' => 'Offering',)
                            , null, ['class' => 'form-control', 'multiple' => 'true', 'required' => 'required']) !!}
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