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
                <div class="well well-lg"> My closed projects</div>
                <div class="well well-lg"> My closed pilots</div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 placeholder">
                <h4>Projects by partner</h4>
                <span class="text-muted">Something else</span>

                    <div class="well well-lg">
                        <div>
                            <h2 class="m-top-none value">0</h2>
                            <h5>DID Net Additions (1 Total)</h5>

                            <div class="value_change"><i class="fa fa-dot-circle-o fa-lg"></i><span class="m-left-xs">The same as previously</span></div>

                            <div class="stat-icon">
                                <i class="fa fa-phone fa-3x"></i>
                            </div>
                        </div>
                        <div class="back" style="transform: rotateY(-180deg); height: 126px; width: 219px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out; backface-visibility: hidden;">
                            <h4>DID Net Additions</h4>
                            <ul class="list-group no-margin">
                                <li class="list-group-item">

                                    <span class="current_date">Day ending 2016-02-26&nbsp;</span>
                                    <span class="pull-right value">0</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="previous_date">Day ending 2016-02-25&nbsp;</span>
                                    <span class="pull-right previous_value">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>

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
                <h4>My projects comments</h4>
                <span class="text-muted">Last post from projects</span>

                @foreach($comments as $comment)
                    <h5>"{{ $comment->comment_text }}" <small>by {{ $comment->comment_owner }} on {{ $comment->created_at }} - Project {{ Html::link('projects/'.$comment->id, $comment->project_name) }}</small></h5>
                @endforeach
                {!! $comments->links() !!}
            </div>
        </div>

    </div>

    {!! Html::script('js/chart.min.js') !!}

    <script>
        (function(){
            var ctx = document.getElementById('daily-reports').getContext("2d");
            var chart =
                    {!! $projectsbyregion !!}
                    ;

            new Chart(ctx).PolarArea(chart,{
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
                    fillColor: "rgba(242, 88, 34, 0.4)",
                    strokeColor: "rgba(242, 88, 34, 0.8)",
                    data: {!! json_encode($totalp) !!},
                }],
            };

            new Chart(ctx).Line(chart,{
                bezierCurve : true,
            });
        })();
    </script>

@stop