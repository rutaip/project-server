@extends('template')

@section('page')
    ACDs
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../acds/create" class="btn btn-primary">New ACD</a></div>
        @endcan

    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">ACD ID</td>
                <td>ACD Type</td>
                <td>version</td>
                <td>Color</td>
            </tr>

            @foreach($acds as $acd)
                <tr height="40" align="center" >
                    <td>{{$acd->id}}</td>
                    <td>{{$acd->acd_type}}</td>
                    <td>{{$acd->version}}</td>
                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $acd->color }}" aria-hidden="true"></span></td>
                </tr>

            @endforeach
        </table>
    </div>

@stop