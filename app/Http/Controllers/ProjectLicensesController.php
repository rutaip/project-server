<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectLicenseRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProjectLicense;
use DB;

class ProjectLicensesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function store(ProjectLicenseRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        ProjectLicense::create($request->all());
        session()->flash('flash_message', 'Record successfully created!');
        return redirect('projects/'.$request->project_id);
    }

    public function edit($id)
    {
        $license = ProjectLicense::findOrFail($id);
        $modules = DB::table('modules')->orderBy('id', 'asc')->lists('name','name');


        return view('projects.license', compact('license', 'modules'));
    }

    public function update(ProjectLicenseRequest $request, $id)
    {
        $license = ProjectLicense::findOrFail($id);

        /*if  (Gate::denies('edit', $pm)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $license->update($request->all());

        session()->flash('flash_message', 'Record successfully updated!');
        
        return redirect('projects/'.$request->project_id);
    }

}
