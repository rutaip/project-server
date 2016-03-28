@extends('template')

@section('page')
    Edit Project {{ $project->project_name }}
@stop

@section('content')


    {!! Form::model($project, ['method' => 'PATCH', 'action' => ['ProjectsController@update', $project->id]]) !!}

    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>General Information</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('project_name', 'Project Name') !!}</th>
                    <td>{!! Form::text('project_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('customer_id', 'Customer') !!}</th>
                    <td>{!! Form::select('customer_id', $customer, old('customer_id'),['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('partner_id', 'Implementation Partner') !!}</th>
                    <td>{!! Form::select('partner_id', $partner, old('partner_id'),['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('support_partner_id', 'Support Partner') !!}</th>
                    <td>{!! Form::select('support_partner_id', $partner, old('support_partner_id'),['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('region_id', 'Region') !!}</th>
                    <td>{!! Form::select('region_id', $region, old('region_id'),['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('country', 'Country') !!}</th>
                    <td>{!! Form::select('country', $countries, null,['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th>{!! Form::label('pm_id', 'Presence PM') !!}</th>
                    <td>{!! Form::select('pm_id', $project_managers , old('pm_id'),['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Status & Dates</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('master_status', 'General Status') !!}</th>
                    <td>{!! Form::select('master_status', array('Working' => 'Working', 'StandBy' => 'Stand By', 'Offerings' => 'Offerings', 'Finished' => 'Finished'), null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('status', 'Phase') !!}</th>
                    <td>{!! Form::select('status', array('On_Time' => 'On Time', 'Delayed' => 'Delayed', 'Risk' => 'On Risk', 'Pending' => 'No Dates', 'Production' => 'Production', 'Pilot' => 'Pilot Started'), null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('original_date', 'Original Due Date') !!}</th>
                    <td>{!! Form::input('date', 'original_date', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('expected_date', 'Expected Due Date') !!}</th>
                    <td>{!! Form::input('date', 'expected_date', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('delivery_date', 'Real Delivery Date') !!}</th>
                    <td>{!! Form::input('date', 'delivery_date', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('days_contracted', 'Days Contracted') !!}</th>
                    <td>{!! Form::text('days_contracted', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('days_spent', 'Real Days Spent') !!}</th>
                    <td>{!! Form::text('days_spent', null, ['class' => 'form-control']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-responsive col-md-6">
                <caption>Project Description</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('description', 'Project Description') !!}</th>
                    <td>{!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('tags', 'Tags') !!}</th>
                    <td>{!! Form::select('tags[]', $tags, $project->tags->lists('id')->toArray(), ['id'=>'tags', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered table-responsive col-md-6">
                <caption>Technical & Operation Details</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('acd_type_id', 'ACD Type') !!}</th>
                    <td>{!! Form::select('acd_type_id', array('1' => 'Avaya', '2' => 'Opengate'), null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('project_type_id', 'Project Type') !!}</th>
                    <td>{!! Form::select('project_type_id', array('1' => 'Pilot', '2' => 'Project'), null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('imp_type', 'Implementation Type') !!}</th>
                    <td>{!! Form::select('imp_type', array('new_imp' => 'New Implementation', 'upgrade' => 'Upgrade', 'modules' => 'New modules', 'migration' => 'Migration', 'development' => 'Development', 'other' => 'Other'), null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('integrations', 'Integrations') !!}</th>
                    <td>{!! Form::select('integrations', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('pre_integrations', 'Presence Integrations') !!}</th>
                    <td>{!! Form::select('pre_integrations', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('campaign', 'Project Campaign') !!}</th>
                    <td>{!! Form::text('campaign', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('gdrive_link', 'Google Drive Link') !!}</th>
                    <td>{!! Form::text('gdrive_link', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('crm_link', 'Presence CRM Link') !!}</th>
                    <td>{!! Form::text('crm_link', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('pl_link', 'P&L File Link') !!}</th>
                    <td>{!! Form::text('pl_link', null, ['class' => 'form-control']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-responsive col-md-6">
                <caption>Costs</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('amount_pending', 'Billing Pending') !!}</th>
                    <td>{!! Form::select('amount_pending', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control']) !!}</td>

                </tr>
                <tr>
                    <th scope=row>{!! Form::label('amount_eur', 'Amount (€)') !!}</th>
                    <td>{!! Form::text('amount_eur', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('amount_usd', 'Amount ($)') !!}</th>
                    <td>{!! Form::text('amount_usd', null, ['class' => 'form-control']) !!}</td>

                </tr>
                <tr>
                    <th scope=row>{!! Form::label('expenses_reported_eur', 'Travel Expenses Reported (€)') !!}</th>
                    <td>{!! Form::text('expenses_reported_eur', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('expenses_reported_usd', 'Travel Expenses Reported ($)') !!}</th>
                    <td>{!! Form::text('expenses_reported_usd', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('not_expenses_reported_eur', 'Travel Expenses Reported NOT Billable (€)') !!}</th>
                    <td>{!! Form::text('not_expenses_reported_eur', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('not_expenses_reported_usd', 'Travel Expenses Reported NOT Billable ($)') !!}</th>
                    <td>{!! Form::text('not_expenses_reported_usd', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('cost_project_mo', 'Cost Project MO') !!}</th>
                    <td>{!! Form::text('cost_project_mo', null, ['class' => 'form-control']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <br>

@stop

@section('footer')
    <script type="text/javascript">
        $('#tags').select2({
            placeholder: 'Select an option',
            tags: true,
            tokenSeparators: [",", " "],
            createTag: function(newTag) {
                return {
                    id: 'new:' + newTag.term,
                    text: newTag.term + ' (new)'
                };
            }
        });
    </script>
@endsection