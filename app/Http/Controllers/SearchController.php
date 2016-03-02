<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Integration;
use App\Comment;

class SearchController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function search(Request $request)
    {

        $string = $request->search;

        $integrations = Integration::select('project_id', 'information', 'name', 'integration_owner')
            ->Where('information','LIKE','%'.$request->search.'%')
            ->orWhere('name','LIKE','%'.$request->search.'%')
            ->paginate(10);

        $comments = Comment::Where('comment_text','LIKE','%'.$request->search.'%')
            ->paginate(10);

        return view('search.index', compact('integrations', 'comments', 'string'));
    }
}
