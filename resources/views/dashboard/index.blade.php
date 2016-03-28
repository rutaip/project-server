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
                <h4>My closed activities {{ Carbon\Carbon::now()->year }}</h4>
                <span class="text-muted">Projects & Pilots</span>
                <div class="well well-lg"> My closed projects <strong>{{ $closedprojects }}</strong></div>
                <div class="well well-lg"> My closed pilots <strong>{{ $closedpilots }}</strong></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 placeholder">
                <h4>Project Tags Cloud</h4>
                        <div id="example"></div>
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
                        <span class="badge">0</span>
                        My current tasks
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ $offerings }}</span>
                        Current Offerings
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

@section('footer')
    <script type="text/javascript">
        /*!
         * Create an array of word objects, each representing a word in the cloud
         */
        var word_array = [
            {text: "Outbound", weight: 15, link: "http://jquery.com/"},
            {text: "Billing", weight: 9, link: "http://jquery.com/"},
            {text: "Dolor", weight: 6, html: {title: "I can haz any html attribute"}},
            {text: "Sit", weight: 7},
            {text: "Sit", weight: 7},
            {text: "Sit", weight: 8},
            {text: "Sit", weight: 9},
            {text: "Sit", weight: 8},
            {text: "Amet", weight: 5}
            // ...as many words as you want
        ];

        $(function() {
            // When DOM is ready, select the container element and call the jQCloud method, passing the array of words as the first argument.
            $("#example").jQCloud(word_array, {
                width: 250,
                height: 200,
                autoResize: true
            });
        });
    </script>


@endsection