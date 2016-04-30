<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Project;
use App\Comment;
use Auth;
use DB;
use Gate;
use Mail;
use Carbon\Carbon;
use App\Invoice;
use App\Task;
use Countries;
use App\Notification;

class ProjectsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {

        $auth_user=Auth::user();

        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');


        $projects = Project::where('master_status', '=', 'Working' )
            ->where('created_at', '>=', Carbon::now()->startOfYear());

        if  (Gate::denies('worldwide')) {

            $projects->where('user_id', 'LIKE', '%'.$auth_user->id.'%')
                ->orWhere('region_id', 'LIKE', '%'.$auth_user->region_id.'%');

        }

        $projects = $projects->latest()->get();
        

        return view('projects.index', compact('projects', 'region'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $comments_count = Comment::where('project_id', $id)->count();
        $tasks_sum = Task::where('project_id', $id)->where('parent_task', '>', 0)->sum('completed');
        $resources = Resource::orderBy('name', 'asc')->lists('name', 'id');
        $tasks = Task::where('project_id', $id)->orderBy('id', 'asc')->lists('name','id');
        $modules = DB::table('modules')->orderBy('id', 'asc')->lists('name','name');

        return view('projects.show',compact('project', 'comments_count', 'modules', 'resources', 'tasks', 'tasks_count', 'tasks_sum'));
    }

    public function create()
    {
        $customer = DB::table('customers')->orderBy('id', 'asc')->lists('customer_name','id');
        $partner = DB::table('partners')->orderBy('partner_name', 'asc')->lists('partner_name','id');
        $project_managers = DB::table('pms')->select(DB::raw('concat (first," ",last) as full_name,id'))->orderBy('id', 'asc')->lists('full_name','id');
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $acd_type = DB::table('acds')->orderBy('id', 'asc')->lists('acd_type','id');
        $countries = Countries::orderBy('name')->lists('name', 'name');
        $tags = Tag::lists('name', 'id');

        return view('projects.create', compact('customer','partner','project_managers','region','acd_type', 'countries', 'tags'));

    }

    public function store(ProjectRequest $request)
    {

        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        if  (Gate::denies('create_project', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        $project = Project::create($request->all());
        $this->syncTags($project, $request);

        $invoice = new Invoice();
        $invoice->project_id=$project->id;
        $invoice->currency='USD';
        $invoice->agreement=0;
        $invoice->save();


        $this->newTasks($project);
        $this->email('user_new_project', $project, 'Create');
        $this->email('region_new_project', $project, 'Create');
        $this->email('ww_new_project', $project, 'Create');

        flash()->success('Record successfully created!');

        return redirect('projects');
    }

    public function edit($id)
    {
        $customer = DB::table('customers')->orderBy('id', 'asc')->lists('customer_name','id');
        $partner = DB::table('partners')->orderBy('partner_name', 'asc')->lists('partner_name','id');
        $project_managers = DB::table('pms')->select(DB::raw('concat (first," ",last) as full_name,id'))->orderBy('id', 'asc')->lists('full_name','id');
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $acd_type = DB::table('acds')->orderBy('id', 'asc')->lists('acd_type','id');
        $countries = Countries::orderBy('name')->lists('name', 'name');
        $tags = Tag::lists('name', 'id');

        $project = Project::findOrFail($id);

        if (Gate::denies('edit-project', $project)){

            abort(403, 'Sorry, not allowed');
        }

        return view('projects.edit',compact('project','customer','partner','project_managers','region','acd_type', 'countries', 'tags'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);

        /*if  (Gate::denies('edit', $role)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $project->update($request->all());

        $this->syncTags($project, $request);
        
        $this->email('user_update_project', $project, 'Update');
        $this->email('region_update_project', $project, 'Update');
        $this->email('ww_update_project', $project, 'Update');

        session()->flash('flash_message', 'Record successfully updated!');
        
        return redirect('projects/'.$id);
    }

    public function search(Request $request)
    {

        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');


        $projects = Project::where('created_at', '>=', Carbon::now()->startOfYear());


        /*filters form*/

        $projects->where(function($query) use ($request){

            foreach ($request->region_id as $regions) {
                $query->orWhere('region_id', 'LIKE', '%'.$regions.'%');
            }

        });

        $projects->where(function($query) use ($request){

            foreach ($request->master_status as $statuses){
                $query->orWhere('master_status', 'LIKE', '%'.$statuses.'%');
            }

        });

        $projects = $projects->latest()->get();
        /* end filter query */

        return view('projects.index', compact('projects', 'region'));
    }

    private function syncTags($project, $request)
    {
        if ( ! $request->has('tags'))
        {
            $project->tags()->detach();
            return;
        }

        $allTagIds = array();

        foreach ($request->tags as $tagId)
        {
            if (substr($tagId, 0, 4) == 'new:')
            {
                $newTag = Tag::create(['name' => substr($tagId, 4)]);
                $allTagIds[] = $newTag->id;
                continue;
            }
            $allTagIds[] = $tagId;
        }

        $project->tags()->sync($allTagIds);
    }

    private function newTasks($project){
        $parent = Task::create(['name' => $project->project_name, 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1']);
        Task::create(['name' => 'POC/Commercial Offer', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'SOW', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'Kickoff', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'Validation Checklist', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'Training', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'UAT', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'Go live', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
        Task::create(['name' => 'End of project', 'project_id' => $project->id, 'completed' => '0', 'task_owner' => '1', 'parent_task' => $parent->id]);
    }
    
    private function email($tag, $project, $action){
        $notifications=Notification::where('name', $tag)->with('users')->get();

        $email= array();
        foreach ($notifications as $notification){
            foreach ($notification->users as $users){
                $email[] = $users->email;
            }
        }

        Mail::send('emails.project_update', ['project' => $project, 'action' => $action], function ($m) use ($email, $project, $action) {
            $m->from('project@presenceco.com', 'Presence Project Server');

            $m->bcc($email)->subject('Project ' . $project->project_name . ' '.$action . ' - Presence Project Server');
        });
    }
    
}
