<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Integration;
use App\Comment;
use App\Tag;

class SearchController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function show($tag)
    {

        $projects = Project::whereHas('tags',
            function ($query) use ($tag) {
                $query->where('name', 'LIKE', '%'.$tag.'%');
            })->get();

        return view('search.show', compact('projects', 'tag'));
    }

    public function search(Request $request)
    {

        $string = $request->search;

        $projects = Project::Where('project_name','LIKE','%'.$request->search.'%')
            ->orWhere('description','LIKE','%'.$request->search.'%')
            ->paginate(10);

        $integrations = Integration::select('project_id', 'information', 'name', 'integration_owner')
            ->Where('information','LIKE','%'.$request->search.'%')
            ->orWhere('name','LIKE','%'.$request->search.'%')
            ->paginate(10);

        $comments = Comment::Where('comment_text','LIKE','%'.$request->search.'%')
            ->Where('project_id','>','0')
            ->paginate(10);

        $tags = Tag::Where('name','LIKE','%'.$request->search.'%')
            ->paginate(10);

        return view('search.index', compact('projects', 'integrations', 'comments', 'string', 'tags'));
    }
}
