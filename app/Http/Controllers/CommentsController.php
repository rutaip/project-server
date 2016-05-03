<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Offering;
use App\Project;
use Gate;
use Mail;
use App\Notification;

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

        if ($request->offering_id == '') {

            $project = Project::find($request['project_id']);
            $project->site='projects';
        }
        else {
            $project = Offering::find($request['offering_id']);
            $project->site='offerings';
        }
        

        $this->email('user_new_comments', $request['comment_text'], $project, 'Create');
        $this->email('region_new_comments', $request['comment_text'], $project, 'Create');
        $this->email('ww_new_comments', $request['comment_text'], $project, 'Create');
        
        
        session()->flash('flash_message', 'Record successfully created!');

        if ($request->offering_id == '') {

            return redirect('projects/' . $request->project_id);
        }        

        return redirect('offerings/' . $request->offering_id);

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

        session()->flash('flash_message', 'Record successfully updated!');

        return redirect('comments');
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if  (Gate::denies('delete', $comment)) {

            abort(403, 'Sorry, not allowed');
        }

        $comment->delete();

        session()->flash('flash_message', 'Record successfully deleted!');
        return redirect('comments');
    }

    private function email($tag, $comments, $project, $action){
        $notifications=Notification::where('name', $tag)->with('users')->get();

        $email= array();
        foreach ($notifications as $notification){
            foreach ($notification->users as $users){
                $email[] = $users->email;
            }
        }

        Mail::send('emails.comments', ['project' => $project, 'comments' => $comments, 'action' => $action], function ($m) use ($email, $project) {
            $m->from('project@presenceco.com', 'Presence Project Server');

            $m->to($email)->subject('New comments on ' . $project->project_name . ' - Presence Project Server');
        });
    }
}
