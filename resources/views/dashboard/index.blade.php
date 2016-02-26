@extends('template')

@section('page')
    Dashboard
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 placeholder">

            <div class="col-xs-12 col-sm-6 col-md-3 placeholder">
                <h4>Projects {{ Carbon\Carbon::now()->year }} by region</h4>
                <span class="text-muted">Project & Pilot</span>

                <canvas id="daily-reports" width="200" height="150" class="img-responsive text-center" style="margin-left: auto; margin-right: auto"></canvas>
                <hr>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 placeholder">
                <h4>Projects {{ Carbon\Carbon::now()->year }} by month</h4>
                <span class="text-muted">Project & Pilot</span>

                <canvas id="daily-reports2" width="200" height="150" class="img-responsive text-center" style="margin-left: auto; margin-right: auto"></canvas>
                <hr>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 placeholder">
                <h4>Projects by partner</h4>
                <span class="text-muted">Something else</span>
                <canvas id="daily-reports3" width="200" height="150" class="img-responsive text-center" style="margin-left: auto; margin-right: auto"></canvas>
                <hr>

            </div>
        </div>

        <div class="col-md-12 placeholder">


            <div class="col-md-6 placeholder">
                <h4>User General Details</h4>
                <span class="text-muted">Personal metrics</span>
                <ul class="list-group">
                    <li class="list-group-item active">
                        <span class="badge">{{ $projects }}</span>
                        My projects in progress
                    </li>
                    <li class="list-group-item">
                        <span class="badge">14</span>
                        Current tasks
                    </li>
                    <li class="list-group-item">
                        <span class="badge">14</span>
                        Professional Services Requirements
                    </li>
                </ul>
            </div>

            <div class="col-md-6 placeholder">
                <h4>Personal metrics</h4>
                <span class="text-muted">Last post from projects</span>
            </div>



        </div>

    </div>

    {!! Html::script('js/chart.min.js') !!}

    <script>
        (function(){
            var ctx = document.getElementById('daily-reports').getContext("2d");
            var chart = {
                labels: {!! json_encode($regions) !!},

                datasets: [{
                    pointStrokeColor: "#fff",
                    fillColor: "rgba(242, 88, 34, 0.7)",
                    strokeColor: "rgba(242, 88, 34, 0.7)",
                    highlightFill: "rgba(242, 88, 34, 1)",
                    highlightStroke: "rgba(242, 88, 34, 1)",
                    data: {!! json_encode($totals) !!} ,
                }],
            };

            new Chart(ctx).Bar(chart,{
                bezierCurve : true,
            });
        })();
    </script>

    <script>
        (function(){
            var ctx = document.getElementById('daily-reports2').getContext("2d");
            var chart = {
                labels: {!! json_encode($months) !!},

                datasets: [{
                    pointColor: "rgba(242, 88, 34, 0.7)",
                    pointStrokeColor: "rgba(242, 88, 34, 0.7)",
                    pointHighlightFill: "rgba(242, 88, 34, 1)",
                    fillColor: "rgba(242, 88, 34, 0.7)",
                    strokeColor: "rgba(242, 88, 34, 0.8)",
                    data: {!! json_encode($totalp) !!},
                }],
            };

            new Chart(ctx).Line(chart,{
                bezierCurve : true,
            });
        })();
    </script>

    <script>
        (function(){
            var ctx = document.getElementById('daily-reports3').getContext("2d");
            var chart =
                {!! $projectsbystatus !!}
            ;

            new Chart(ctx).PolarArea(chart,{
                bezierCurve : true,
            });
        })();
    </script>

@stop