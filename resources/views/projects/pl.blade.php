<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-6">
            <h4>Invoice Currency {{$project->invoice->currency}}</h4>
        </div>
        <div class="col-md-6">
            <h4>Exchange Rate {{ $exchange =  0.89 }}</h4>

        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

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
    <div class="col-md-12">
        <table class="table table-bordered small">
            <caption>Invoicing</caption>
            <thead>
            <tr class="active">
                <th width="20%">Currency</th>
                <th class="success" width="5%">Budget</th>
                <th width="5%">Jan</th>
                <th width="5%">Feb</th>
                <th width="5%">Mar</th>
                <th width="5%">Apr</th>
                <th width="5%">May</th>
                <th width="5%">Jun</th>
                <th width="5%">Jul</th>
                <th width="5%">Aug</th>
                <th width="5%">Sep</th>
                <th width="5%">Oct</th>
                <th width="5%">Nov</th>
                <th width="5%">Dec</th>
                <th width="5%">YTD</th>
                <th width="5%">Var.</th>
                <th width="5%">%</th>
            </tr> </thead>
            <tbody>
                <tr>
                    <td>{{$project->invoice->currency}}</td>
                    <td class="success">{{$project->invoice->agreement}}</td>
                    <td>{{$project->invoice->january}}</td>
                    <td>{{$project->invoice->february}}</td>
                    <td>{{$project->invoice->march}}</td>
                    <td>{{$project->invoice->april}}</td>
                    <td>{{$project->invoice->may}}</td>
                    <td>{{$project->invoice->june}}</td>
                    <td>{{$project->invoice->july}}</td>
                    <td>{{$project->invoice->august}}</td>
                    <td>{{$project->invoice->september}}</td>
                    <td>{{$project->invoice->october}}</td>
                    <td>{{$project->invoice->november}}</td>
                    <td>{{$project->invoice->december}}</td>
                    <th>{{$project->invoice->YDT}}</th>
                    <th>{{$project->invoice->YDT-$project->invoice->agreement}}</th>
                    <th>
                        @if ($project->invoice->agreement > 0)
                            {{(abs($project->invoice->YDT-$project->invoice->agreement)/$project->invoice->agreement)*100}} %
                        @endif
                    </th>
                </tr>
                <tr>
                    <td>EUR</td>
                    <td class="success">{{$project->invoice->agreement*$exchange}}</td>
                    <td>{{$project->invoice->january*$exchange}}</td>
                    <td>{{$project->invoice->february*$exchange}}</td>
                    <td>{{$project->invoice->march*$exchange}}</td>
                    <td>{{$project->invoice->april*$exchange}}</td>
                    <td>{{$project->invoice->may*$exchange}}</td>
                    <td>{{$project->invoice->june*$exchange}}</td>
                    <td>{{$project->invoice->july*$exchange}}</td>
                    <td>{{$project->invoice->august*$exchange}}</td>
                    <td>{{$project->invoice->september*$exchange}}</td>
                    <td>{{$project->invoice->october*$exchange}}</td>
                    <td>{{$project->invoice->november*$exchange}}</td>
                    <td>{{$project->invoice->december*$exchange}}</td>
                    <th>{{$project->invoice->YDT*$exchange}}</th>
                    <th>{{($project->invoice->YDT-$project->invoice->agreement)*$exchange}}</th>
                    <th>
                        @if ($project->invoice->agreement > 0)
                            {{(abs($project->invoice->YDT-$project->invoice->agreement)/$project->invoice->agreement)*100}} %
                        @endif
                    </th>
                </tr>
            </tbody>

        </table>
        <table class="table table-bordered small">
            <caption>Labor cost</caption>
            <thead>
                <tr class="active">
                    <th width="12%">Resource</th>
                    <th width="8%">Country</th>
                    <th width="5%" class="success">Budget</th>
                    <th width="5%">Jan</th>
                    <th width="5%">Feb</th>
                    <th width="5%">Mar</th>
                    <th width="5%">Apr</th>
                    <th width="5%">May</th>
                    <th width="5%">Jun</th>
                    <th width="5%">Jul</th>
                    <th width="5%">Aug</th>
                    <th width="5%">Sep</th>
                    <th width="5%">Oct</th>
                    <th width="5%">Nov</th>
                    <th width="5%">Dec</th>
                    <th width="5%">YTD</th>
                    <th width="5%">Var.</th>
                    <th width="5%">%</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Solutions Developer</td>
                    <td>Colombia</td>
                    <td class="success">{{$project->invoice->agreement}}</td>
                    <td>{{$project->invoice->january}}</td>
                    <td>{{$project->invoice->february}}</td>
                    <td>{{$project->invoice->march}}</td>
                    <td>{{$project->invoice->april}}</td>
                    <td>{{$project->invoice->may}}</td>
                    <td>{{$project->invoice->june}}</td>
                    <td>{{$project->invoice->july}}</td>
                    <td>{{$project->invoice->august}}</td>
                    <td>{{$project->invoice->september}}</td>
                    <td>{{$project->invoice->october}}</td>
                    <td>{{$project->invoice->november}}</td>
                    <td>{{$project->invoice->december}}</td>
                    <th>{{$project->invoice->YDT}}</th>
                    <th>{{$project->invoice->YDT-$project->invoice->agreement}}</th>
                    <th>
                        @if ($project->invoice->agreement > 0)
                            {{(abs($project->invoice->YDT-$project->invoice->agreement)/$project->invoice->agreement)*100}} %
                        @endif
                    </th>
                </tr>

            </tbody>

        </table>
    </div>
</div>