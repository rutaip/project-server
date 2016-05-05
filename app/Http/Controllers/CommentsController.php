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
use Auth;
use App\User;

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

        //inicio de email

        $email=array();
        $logged_user = Auth::user();
        $user_notification = User::with('notifications')->where('email', $logged_user->email) //notificacion new project user
        ->whereHas('notifications', function($query) {
            $query->where('name', 'user_new_comments');
        })->first();

        if($user_notification){
            $email[]=$user_notification->email;
        }

        $region_notification=Notification::where('name', 'region_new_comments') //notificacion new project region
        ->with('users')
            ->whereHas('users', function($query) use ($project) {
                $query->where('region_id', $project->region_id);
            })
            ->get();

        foreach ($region_notification as $notification){
            foreach ($notification->users as $users){
                $email[] = $users->email;
            }
        }

        $ww_notification=Notification::where('name', 'ww_new_comments') //notificaciones worldwide
        ->with('users')->get();

        foreach ($ww_notification as $notification){
            foreach ($notification->users as $users){
                $email[] = $users->email;
            }
        }


        $this->email($email, $request['comment_text'], $project, 'Create'); //llama funcion de email

        //fin de email

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

    private function email($email, $comments, $project, $action){


        Mail::send('emails.comments', ['project' => $project, 'comments' => $comments, 'action' => $action], function ($m) use ($email, $project) {
            $m->from('project@presenceco.com', 'Presence Project Server');

            $m->to($email)->subject('New comments on ' . $project->project_name . ' - Presence Project Server');
        });
    }
}
