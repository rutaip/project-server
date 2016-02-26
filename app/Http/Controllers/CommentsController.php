<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use Gate;

class CommentsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $comments = Comment::latest()->get();

        if  (Gate::denies('comments', $comments)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('comments.index', compact('comments'));
    }

    public function create()
    {

        return view('comments.create');
    }

    public function store(CommentRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Comment::create($request->all());
        //Session::flash('flash_message', 'Registro creado correctamente!');
        return redirect('projects/'.$request->project_id);
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.show', compact('comment'));
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if  (Gate::denies('edit', $comment)) {

            abort(403, 'Sorry, not allowed');
        }

        $comment->update($request->all());

        return redirect('comments');
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if  (Gate::denies('delete', $comment)) {

            abort(403, 'Sorry, not allowed');
        }

        $comment->delete();

        return redirect('comments');
    }
}
