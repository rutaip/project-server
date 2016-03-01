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

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Project</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Costs</a></li>
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
            <!-- fin pestaña integartions

            <!-- pestaña tareas-->
            <div role="tabpanel" class="tab-pane fade" id="tasks">

            </div>
            <!-- fin pestaña tareas -->

        </div>

    </div>



@stop
