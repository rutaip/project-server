<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-4">
            <h4>{{Html::Link($offering->vsp_link,'PS File Link')}}</h4>

        </div>
        <div class="col-md-4">
            <a href="#settings" class="btn btn-default btn-block" aria-controls="settings" role="tab" data-toggle="tab">Comments <span class="badge">{{ $comments_count }}</span></a>

        </div>
        <div class="col-md-4">
            @can('edit-offering', $offering)
            <a href="../offerings/{{ $offering->id }}/edit" class="btn btn-default btn-block">Update</a>
            @endcan
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <caption>Offering Description</caption>
            <thead>
                <tr>
                    <td>{{$offering->description}}</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>

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
                <td>{{$offering->master_status}}</td>
            </tr>
            <tr>
                <th scope=row>Customer</th>
                <td>{{$offering->customer->customer_name}}</td>
            </tr>
            <tr>
                <th scope=row>Region / Country</th>
                <td>{{$offering->region->region}} / {{$offering->country}}</td>
            </tr>
            <tr>
                <th scope=row>Presence PM</th>
                <td>{{$offering->pm->first}} {{$offering->pm->last}}</td>
            </tr>
            <tr>
                <th scope=row>Partner</th>
                <td>{{$offering->partner->partner_name}}</td>
            </tr>
            <tr>
                <th scope=row>SD</th>
                <td>{{$offering->sd}}</td>
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
                <th scope=row>Original Date</th>
                <td>{{$offering->original_date}}</td>
            </tr>
            <tr>
                <th scope=row>Expected Date</th>
                <td>{{$offering->expected_date}}</td>
            </tr>
            <tr>
                <th scope=row>Real Delivery Date</th>
                <td>{{$offering->delivery_date}}</td>
            </tr>
            <tr>
                <th scope=row>Days Contracted</th>
                <td>{{$offering->days_contracted}}</td>
            </tr>
            <tr>
                <th scope=row>Days Spent</th>
                <td>{{$offering->days_spent}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <caption>Costs</caption>
            <thead>
            <tr class="active">
                <th>Item</th>
                <th>Status</th>
            </tr> </thead>
            <tbody>
            <tr>
                <th scope=row>Billing Pending</th>
                <td>{{$offering->amount_pending}}</td>
            </tr>
            <tr>
                <th scope=row>Amount (€)</th>
                <td>{{$offering->amount_eur}}</td>
            </tr>
            <tr>
                <th scope=row>Amount ($)</th>
                <td>{{$offering->amount_usd}}</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="col-md-6">

    </div>
</div>