@extends('template')

@section('page')
    Partners
@stop

@section('content')


    <div class="row">
        @can('create')
        <div class="col-md-2 pull-right"><a href="../partners/create" class="btn btn-primary">New Partner</a></div>
        @endcan
    </div>

    <br>

    <div class="row">

        <table width="100%" class="table-bordered table-responsive">
            <tr height="50" align="center" class="h4">
                <td width="10%">Partner ID</td>
                <td>Partner</td>
                <td>Country</td>
                <td>Region</td>
                <td>Color</td>
                @can('options')
                <td width="30%">Options</td>
                @endcan
            </tr>

            @foreach($partners as $partner)
                <tr height="40" align="center" >
                    <td>{{$partner->id}}</td>
                    <td>{{$partner->partner_name}}</td>
                    <td>{{$partner->partner_country}}</td>
                    <td>{{$partner->region->region}}</td>
                    <td><span class="glyphicon glyphicon-tint" style="color:{{ $partner->color }}" aria-hidden="true"></span></td>
                    @can('options')
                    <td>

                        {!! Form::model($partner, ['method' => 'DELETE', 'url' => 'partners/' . $partner->id, 'class' => 'btn-delete']) !!}
                        @can('edit')
                        <a href="{{ url('partners/' . $partner->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
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