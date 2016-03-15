<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-6">
            <h4>Billing Pending = {{$project->amount_pending}}</h4>
        </div>
        <div class="col-md-6">
            <h4>Cost Project MO {{$project->cost_project_mo}}</h4>
        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-8">
            <h4>{{ Html::link($project->pl_link, 'P&L File link') }}</h4>
        </div>
        <div class="col-md-4">
            <button class="btn btn-default btn-block" type="button">
                Update
            </button>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <caption>USD Values</caption>
            <thead>
            <tr class="active">
                <th>Item</th>
                <th>Status</th>
            </tr> </thead>
            <tbody>
            <tr>
                <th scope=row>Amount (€)</th>
                <td>{{$project->amount_eur}}</td>
            </tr>
            <tr>
                <th scope=row>Travel Expenses Reported (€)</th>
                <td>{{$project->expenses_reported_eur}}</td>
            </tr>
            <tr>
                <th scope=row>Travel Expenses Reported not billable(€)</th>
                <td>{{$project->not_expenses_reported_eur}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-responsive col-md-6">
            <caption>Euro Values</caption>
            <thead>
            <tr class="active">
                <th>Item</th>
                <th>Status</th>
            </tr> </thead>
            <tbody>
            <tr>
                <th scope=row>Amount ($)</th>
                <td>{{$project->amount_usd}}</td>
            </tr>
            <tr>
                <th scope=row>Travel Expenses Reported ($)</th>
                <td>{{$project->expenses_reported_usd}}</td>
            </tr>
            <tr>
                <th scope=row>Travel Expenses Reported not billable($)</th>
                <td>{{$project->not_expenses_reported_usd}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>