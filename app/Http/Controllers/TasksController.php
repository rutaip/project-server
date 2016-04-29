<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Resource;

class TasksController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $resources = Resource::orderBy('name', 'asc')->lists('name', 'id');
        $tasks = Task::where('project_id', $task->project_id)->orderBy('id', 'asc')->lists('name','id');


        return view('tasks.edit', compact('task', 'resources', 'tasks'));
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);

        /*if  (Gate::denies('edit', $integration)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $task->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('projects/'. $task->project_id);
    }
    
}
