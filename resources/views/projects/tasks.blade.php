<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-6">

Total Project Progress

        </div>
        <div class="col-md-6">
            <div class="progress">
                <div class="progress-bar {{$progress_bar}} progress-bar-striped" role="progressbar" aria-valuenow="{{round($tasks_sum/count($project->tasks))}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round($tasks_sum/count($project->tasks))}}%">
                    {{round($tasks_sum/count($project->tasks))}}%
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            @can('edit-project', $project)
            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#new_task">
                New Task
            </button>
            @endcan

            <!-- Modal -->
            <div class="modal fade" id="new_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New task</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url' => 'tasks', 'class' => 'form-horizontal')) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Task Name', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('completed', 'Completed %', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::selectRange('completed', 0, 100, null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('date', 'start_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('finish_date', 'Finish Date', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('date', 'finish_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('parent_task', 'Parent Task', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('parent_task', $tasks, old('parent_task'),['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('resources', 'Task Owner', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('task_owner', $resources, old('task_owner'),['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            {{ Form::hidden('project_id', $project->id) }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::submit('Add Task', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<hr>

<div class="row">
    <table class="table table-bordered">
        <caption>Project Tasks</caption>
        <thead>
        <tr class="active">
            <th>Name</th>
            <th>Days</th>
            <th>Start Date</th>
            <th>Finish Date</th>
            <th>Completed %</th>
            <th>Owner</th>
            <th>Gantt</th>

                @can('edit-project', $project)
                <th> Edit</th>
                @endcan

        </tr> </thead>
        <tbody>
        @foreach($project->tasks as $task)
            <tr>
                <th>{{$task->name}}</th>
                <td>{{$task->days}}</td>
                <td>{{$task->start_date}}</td>
                <td>{{$task->finish_date}}</td>
                <td>{{$task->completed}}</td>
                <td>{{$task->resource->name}}</td>
                <td width="150">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$task->completed}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$task->completed}}%;">
                        {{$task->completed}}%
                    </div>
                </td>
                @can('edit-project', $project)
                    <td><a href="{{ url('tasks/' . $task->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
</div>