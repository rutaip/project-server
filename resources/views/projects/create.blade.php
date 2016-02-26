@extends('template')

@section('page')
    Project Create
@stop

@section('content')

    {!! Form::open(array('url' => 'projects')) !!}

    <table style="width:100%">
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('project_name', 'Project Name') !!}</td>
            <td>{!! Form::text('project_name', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('customer_id', 'Customer') !!}</td>
            <td>{!! Form::select('customer_id', $customer, old('customer_id'),['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('partner_id', 'Implementation Partner') !!}</td>
            <td>{!! Form::select('partner_id', $partner, old('partner_id'),['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('support_partner_id', 'Support Partner') !!}</td>
            <td>{!! Form::select('support_partner_id', $partner, old('support_partner_id'),['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('region_id', 'Region') !!}</td>
            <td>{!! Form::select('region_id', $region, old('region_id'),['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('pm_id', 'Presence PM') !!}</td>
            <td>{!! Form::select('pm_id', $project_managers , old('pm_id'),['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('acd_type_id', 'ACD Type') !!}</td>
            <td>{!! Form::select('acd_type_id', array('1' => 'Avaya', '2' => 'Opengate'), null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('project_type_id', 'Project Type') !!}</td>
            <td>{!! Form::select('project_type_id', array('1' => 'Pilot', '2' => 'Project'), null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('integrations', 'Integrations') !!}</td>
            <td>{!! Form::select('integrations', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('pre_integrations', 'Presence Integrations') !!}</td>
            <td>{!! Form::select('pre_integrations', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('status', 'Phase') !!}</td>
            <td>{!! Form::select('status', array('On_Time' => 'On Time', 'Delayed' => 'Delayed', 'Risk' => 'On Risk', 'Pending' => 'No Dates', 'Production' => 'Production', 'Pilot' => 'Pilot Started'), null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('master_status', 'General Status') !!}</td>
            <td>{!! Form::select('master_status', array('Working' => 'Working', 'StandBy' => 'Stand By', 'Offerings' => 'Offerings', 'Finished' => 'Finished'), null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('original_date', 'Original Due Date') !!}</td>
            <td>{!! Form::input('date', 'original_date', date('Y-m-d'), ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('expected_date', 'Expected Due Date') !!}</td>
            <td>{!! Form::input('date', 'expected_date', date('Y-m-d'), ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('delivery_date', 'Real Delivery Date') !!}</td>
            <td>{!! Form::input('date', 'delivery_date', date('Y-m-d'), ['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('days_contracted', 'Days Contracted') !!}</td>
            <td>{!! Form::text('days_contracted', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('days_spent', 'Real Days Spent') !!}</td>
            <td>{!! Form::text('days_spent', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('amount_eur', 'Amount (€)') !!}</td>
            <td>{!! Form::text('amount_eur', null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('amount_usd', 'Amount ($)') !!}</td>
            <td>{!! Form::text('amount_usd', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('amount_pending', 'Billing Pending') !!}</td>
            <td>{!! Form::select('amount_pending', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('expenses_reported_eur', 'Travel Expenses Reported (€)') !!}</td>
            <td>{!! Form::text('expenses_reported_eur', null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('expenses_reported_usd', 'Travel Expenses Reported ($)') !!}</td>
            <td>{!! Form::text('expenses_reported_usd', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('not_expenses_reported_eur', 'Travel Expenses Reported NOT Billable (€)') !!}</td>
            <td>{!! Form::text('not_expenses_reported_eur', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('not_expenses_reported_usd', 'Travel Expenses Reported NOT Billable ($)') !!}</td>
            <td>{!! Form::text('not_expenses_reported_usd', null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr style="height: 50px;">
            <td align="center">{!! Form::label('cost_project_mo', 'Cost Project MO') !!}</td>
            <td>{!! Form::text('cost_project_mo', null, ['class' => 'form-control']) !!}</td>
            <td align="center">{!! Form::label('comments_id', 'Comments') !!}</td>
            <td>{!! Form::select('comments_id', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control']) !!}</td>

            <td>{!! Form::hidden('user_id', $login->id) !!}</td>
        </tr>
        <tr style="height: 20px;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2">{!! Form::submit('Add Project', ['class' => 'btn btn-primary form-control']) !!}</td>
            <td></td>
            <td></td>
        </tr>
    </table>


    {!! Form::close() !!}


@stop
