@extends('template')

@section('page')
    Offering Create
@stop

@section('content')

    {!! Form::open(array('url' => 'offerings')) !!}

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
                    <th scope=row>{!! Form::label('project_name', 'Offering Name') !!}</th>
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
                    <td>{!! Form::select('master_status', array(
                    'creating' => 'Creating Scope',
                    'accepted' => 'Accepted',
                    'cancelled' => 'Cancelled',
                    'canceled_off' => 'Cancelled before scope ready',
                    'offering' => 'Offering',)
                    ,null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('original_date', 'Original Due Date') !!}</th>
                    <td>{!! Form::input('date', 'original_date', date('Y-m-d'), ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('expected_date', 'Expected Due Date') !!}</th>
                    <td>{!! Form::input('date', 'expected_date', date('Y-m-d'), ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('delivery_date', 'Real Delivery Date') !!}</th>
                    <td>{!! Form::input('date', 'delivery_date', date('Y-m-d'), ['class' => 'form-control']) !!}</td>
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
                <caption>Offering Description</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('description', 'Offering Description') !!}</th>
                    <td>{!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3']) !!}</td>
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
                    <th scope=row>{!! Form::label('sd', 'SD') !!}</th>
                    <td>{!! Form::select('sd', array('No' => 'No', 'Yes' => 'Yes'), null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('vsp_link', 'VSP File Link') !!}</th>
                    <td>{!! Form::text('vsp_link', null, ['class' => 'form-control']) !!}</td>
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
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            {!! Form::hidden('user_id', $login->id) !!}

            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>


    </div>




    {!! Form::close() !!}

    <br>


@stop
