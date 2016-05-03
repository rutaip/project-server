<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\IntegrationRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Integration;
use Mail;
use App\Notification;

class IntegrationsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $integrations = Integration::latest()->get();

        /*if  (Gate::denies('integrations', $integrations)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('integrations.index', compact('integrations'));
    }

    public function create()
    {

        return view('integrations.create');
    }

    public function store(IntegrationRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Integration::create($request->all());
        $project = Project::find($request['project_id']);
        

        $this->email('user_new_integrations', $project, 'Create');
        $this->email('region_new_integrations', $project, 'Create');
        $this->email('ww_new_integrations', $project, 'Create');

        session()->flash('flash_message', 'Record successfully created!');
        return redirect('projects/'.$request->project_id);
    }

    public function show($id)
    {
        $integration = Integration::findOrFail($id);

        return view('integrations.show', compact('integration'));
    }


    public function edit($id)
    {
        $integration = Integration::findOrFail($id);

        return view('integrations.edit', compact('integration'));
    }

    public function update(IntegrationRequest $request, $id)
    {
        $integration = Integration::findOrFail($id);

        /*if  (Gate::denies('edit', $integration)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $integration->update($request->all());

        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('projects/'. $request->project_id);
    }


    public function destroy($id)
    {
        $integration = Integration::findOrFail($id);

        /*if  (Gate::denies('delete', $integration)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $integration->delete();
        session()->flash('flash_message', 'Record successfully deleted!');
        
        return redirect('integrations');
    }

    private function email($tag, $project, $action){
        $notifications=Notification::where('name', $tag)->with('users')->get();

        $email= array();
        foreach ($notifications as $notification){
            foreach ($notification->users as $users){
                $email[] = $users->email;
            }
        }

        Mail::send('emails.integrations', ['project' => $project, 'action' => $action], function ($m) use ($email, $project) {
            $m->from('project@presenceco.com', 'Presence Project Server');

            $m->to($email)->subject('New integration on ' . $project->project_name . ' - Presence Project Server');
        });
    }
}