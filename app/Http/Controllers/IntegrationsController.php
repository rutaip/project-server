<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IntegrationRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Integration;

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
        //Session::flash('flash_message', 'Registro creado correctamente!');
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

        return redirect('projects/'. $request->project_id);
    }


    public function destroy($id)
    {
        $integration = Integration::findOrFail($id);

        /*if  (Gate::denies('delete', $integration)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $integration->delete();

        return redirect('integrations');
    }
}
