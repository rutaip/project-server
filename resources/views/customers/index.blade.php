@extends('template')

@section('page')
    Customers
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../customers/create" class="btn btn-primary">New Customer</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Customer ID</td>
                <td>Customer</td>
                <td>Email</td>
                <td>Country</td>
                <td>Region</td>
                <td>Color</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($customers as $customer)
                <tr height="40" align="center" >
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->customer_name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->region->region}}</td>
                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $customer->color }}" aria-hidden="true"></span></td>
                    @can('options')
                    <td>

                        {!! Form::model($customer, ['method' => 'DELETE', 'url' => 'customers/' . $customer->id, 'class' => 'btn-delete']) !!}
                        @can('edit')
                        <a href="{{ url('customers/' . $customer->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
                        @endcan
                        @can('delete')
                        {!! Form::submit('delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        @endcan
                        {!! Form::close() !!}
                    </td>
                    @endcan
                </tr>

            @endforeach
        </table>
    </div>

@stop