@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-10">
            Search Results for text = {{ $string  }}
        </div>
        <div class="col-md-2">
        </div>

    </div>
@stop

@section('content')

    <table class="table table-bordered">
        <caption>Projects results</caption>
        <thead>
        <tr class="active">
            <th>Project</th>
            <th>Project Description</th>
            <th>Tags</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>

        @foreach($projects as $project)
            <tr>
                <th>{{$project->project_name}}</th>
                <td class="small">{{$project->description}}</td>
                <td class="small">
                    <ul>
                        @foreach($project->tags as $tag)
                        <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </td>

                <td style="text-align: center">
                    {{ Html::link('/projects/'.$project->id, 'more..')}}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {!! $integrations->links() !!}


    <table class="table table-bordered">
        <caption>Integrations results</caption>
        <thead>
        <tr class="active">
            <th>Project</th>
            <th>Integration name</th>
            <th>Information</th>
            <th>Post Owner</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>

        @foreach($integrations as $integration)
            <tr>
                <th>{{$integration->project->project_name}}</th>
                <td>{{$integration->name}}</td>
                <td class="small">{{$integration->information}}</td>
                <td>{{$integration->integration_owner}}</td>

                <td style="text-align: center">
                    {{ Html::link('/projects/'.$integration->project_id, 'more..')}}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {!! $integrations->links() !!}


    <table class="table table-bordered">
        <caption>Comments results</caption>
        <thead>
        <tr class="active">
            <th>Project</th>
            <th>Comments</th>
            <th>Post Owner</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>

        @foreach($comments as $comment)
            <tr>
                <th>{{$comment->project->project_name}}</th>
                <td class="small">{{$comment->comment_text}}</td>
                <td>{{$comment->comment_owner}}</td>

                <td style="text-align: center">
                    {{ Html::link('/projects/'.$comment->project_id, 'more..')}}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {!! $comments->links() !!}

    <table class="table table-bordered">
        <caption>Tags results</caption>
        <thead>
        <tr class="active">
            <th>Project</th>
            <th>Information</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
@foreach($tags as $tag)
    @foreach($tag->projects as $project)
    <tr>
        <th>{{$project->project_name}}</th>
        <td>{{$project->description}}</td>
        <td style="text-align: center">
            {{ Html::link('/projects/'.$project->id, 'more..')}}
        </td>
    </tr>
    @endforeach

@endforeach

        </tbody>
    </table>
    {!! $tags->links() !!}



@stop