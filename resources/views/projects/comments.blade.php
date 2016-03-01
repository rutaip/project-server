<br>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">

        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#new_comment">
                New Comment
            </button>

            <!-- Modal -->
            <div class="modal fade" id="new_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New comment</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url' => 'comments', 'class' => 'form-horizontal')) !!}
                            <div class="form-group">
                                {!! Form::label('comment_text', 'Comment', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('comment_text', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            {{ Form::hidden('comment_owner', $login->name.' '.$login->last) }}
                            {{ Form::hidden('project_id', $project->id) }}



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::submit('Add Comment', ['class' => 'btn btn-primary']) !!}
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
        <caption>Project Updates</caption>
        <thead>
        <tr class="active">
            <th>Date Created</th>
            <th>Date Update</th>
            <th>User</th>
            <th>Comments</th>
        </tr> </thead>
        <tbody>
        @foreach($project->comments as $comment)
            <tr>
                <td>{{$comment->created_at}}</td>
                <td>{{$comment->updated_at}}</td>
                <td>{{$comment->comment_owner}}</td>
                <td>{{$comment->comment_text}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>