@extends('template')

@section('page')

    <div class="row">
        <div class="col-md-6">
            <h3>Project {{ $project->project_name }}</h3>
        </div>
        <div class="col-md-6">

        </div>
    </div>
@stop

@section('content')

    <script>
        $(function () {
            $('#home a').click(function (e) {
                e.preventDefault();
                $('a[href="' + $(this).attr('href') + '"]').tab('show');
            })
        });
    </script>

    @if ($project->status == "On_Time")
        <?php
            $progress_bar='progress-bar-success';
            $progress_dot='images/green.png';
            $progress_dot_alt='On Time';
        ?>
    @elseif($project->status == "Delayed")
        <?php
        $progress_bar='progress-bar-warning';
        $progress_dot='images/yellow.png';
        $progress_dot_alt='Delayed';
        ?>
    @elseif($project->status == "Risk")
        <?php
        $progress_bar='progress-bar-danger';
        $progress_dot='images/red.png';
        $progress_dot_alt='Risk';
        ?>
    @elseif($project->status == "Pending")
        <?php
        $progress_bar='progress-bar-info';
        $progress_dot='images/light_blue.png';
        $progress_dot_alt='Pending';
        ?>
    @elseif($project->status == "Production")
        <?php
        $progress_bar='';
        $progress_dot='images/orange.png';
        $progress_dot_alt='Production';
        ?>
    @elseif($project->status == "Pilot")
        <?php
        $progress_bar='';
        $progress_dot='images/blue.png';
        $progress_dot_alt='Pilot';
        ?>
    @else
        <?php
        $progress_bar='';
        $progress_dot='images/Grey.png';
        $progress_dot_alt='On Time';
        ?>
    @endif

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Project</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Costs</a></li>
            <!--<li role="presentation"><a href="#PL" aria-controls="PL" role="tab" data-toggle="tab">P&L</a></li>-->
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tech Details</a></li>
            <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Project Task</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Comments</a></li>
            <li role="presentation"><a href="#integrations" aria-controls="integrations" role="tab" data-toggle="tab">Integrations</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Primera pestaña General -->
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                @include('projects/generaltab')
            </div>
            <!-- Fin Primera pestaña General -->

            <!-- Pestaña Costos -->
            <div role="tabpanel" class="tab-pane fade" id="profile">
                @include('projects/costs')
            </div>
            <!-- Fin Pestaña Costos -->

            <!-- Pestaña P&L -->
            <div role="tabpanel" class="tab-pane fade" id="PL">
                @include('projects/pl')
            </div>
            <!-- Fin Pestaña Costos -->

            <!-- Pestaña Tech Requ -->
            <div role="tabpanel" class="tab-pane fade" id="messages">
                @include('projects/techdetails')
            </div>
            <!-- fin pestaña Tech Details-->

            <!-- Pestaña Comentarios -->
            <div role="tabpanel" class="tab-pane fade" id="settings">
                @include('projects/comments')
            </div>
            <!-- fin pestaña comentarios-->

            <!-- pestaña integrations-->
            <div role="tabpanel" class="tab-pane fade" id="integrations">
                @include('projects/integrations')
            </div>
            <!-- fin pestaña integrations

            <!-- pestaña tareas-->
            <div role="tabpanel" class="tab-pane fade" id="tasks">
                @include('projects/tasks')
            </div>
            <!-- fin pestaña tareas -->

        </div>

    </div>



@stop
