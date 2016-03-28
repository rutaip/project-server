<?php

namespace App\Http\Controllers;

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
use Carbon\Carbon;
use App\Invoice;
use Countries;

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
        $modules = DB::table('modules')->orderBy('id', 'asc')->lists('name','name');


        return view('projects.show',compact('project', 'comments_count', 'modules'));
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

        $project = Project::create($request->all());
        $this->syncTags($project, $request);

        $invoice = new Invoice();
        $invoice->project_id=$project->id;
        $invoice->currency='USD';
        $invoice->agreement=0;
        $invoice->save();
        //Session::flash('flash_message', 'Registro creado correctamente!');

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

}
