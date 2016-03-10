<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Http\Requests;
use App\Http\Requests\ResourceRequest;
use Gate;

class ResourcesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {

        $resources = Resource::latest()->get();

        if  (Gate::denies('resources', $resources)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('resources.index', compact('resources'));
    }

    public function create()
    {

        return view('resources.create', compact('region'));
    }

    public function store(ResourceRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        Resource::create($request->all());

        //Session::flash('flash_message', 'Registro creado correctamente!');
        return redirect('resources');
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);

        return view('resources.edit', compact('resource'));
    }

    public function update(ResourceRequest $request, $id)
    {
        $resource = Resource::findOrFail($id);

        if  (Gate::denies('edit', $resource)) {

            abort(403, 'Sorry, not allowed');
        }

        $resource->update($request->all());

        return redirect('resources');
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);

        if  (Gate::denies('delete', $resource)) {

            abort(403, 'Sorry, not allowed');
        }

        $resource->delete();

        return redirect('resources');
    }
}
