<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use Gate;
use App\Http\Requests;
use App\Http\Requests\ModuleRequest;
use App\Http\Controllers\Controller;

class ModulesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $modules = Module::latest()->get();


        if  (Gate::denies('modules', $modules)) {

            abort(403, 'Sorry, not allowed');
        }


        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(ModuleRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }


        Module::create($request->all());
        //Session::flash('flash_message', 'Registro creado correctamente!');
        return redirect('modules');
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);

        return view('modules.show', compact('module'));
    }


    public function edit($id)
    {
        $module = Module::findOrFail($id);

        return view('modules.edit', compact('module'));
    }

    public function update(ModuleRequest $request, $id)
    {
        $module = Module::findOrFail($id);

        if  (Gate::denies('edit', $module)) {

            abort(403, 'Sorry, not allowed');
        }


        $module->update($request->all());

        return redirect('modules');
    }


    public function destroy($id)
    {
        $module = Module::findOrFail($id);

        if  (Gate::denies('delete', $module)) {

            abort(403, 'Sorry, not allowed');
        }


        $module->delete();

        return redirect('modules');
    }

}
