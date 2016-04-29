<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RegionRequest;
use App\Http\Controllers\Controller;
use App\Region;
//use Illuminate\Http\Request;
//use Request;
use Route;
use Gate;

class RegionsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $regions = Region::latest()->get();
        $controller_name = Route::currentRouteAction();
        $controller_action = Route::currentRouteName();

        if  (Gate::denies('regions', $regions)) {

            abort(403, 'Sorry, not allowed');
        }


        return view('regions.index', compact('regions', 'controller_name', 'controller_action'));
    }

    public function create()
    {
        $controller_name = Route::currentRouteAction();
        $controller_action = Route::currentRouteName();

        return view('regions.create', compact('controller_name', 'controller_action'));
    }

    public function store(RegionRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }


        Region::create($request->all());
        session()->flash('flash_message', 'Record successfully created!');
        return redirect('regions');
    }

    public function show($id)
    {
        $region = Region::findOrFail($id);

        return view('regions.show', compact('region'));
    }


    public function edit($id)
    {
        $region = Region::findOrFail($id);

        return view('regions.edit', compact('region'));
    }

    public function update(RegionRequest $request, $id)
    {
        $region = Region::findOrFail($id);

        if  (Gate::denies('edit', $region)) {

            abort(403, 'Sorry, not allowed');
        }


        $region->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('regions');
    }


    public function destroy($id)
    {
        $region = Region::findOrFail($id);

        if  (Gate::denies('delete', $region)) {

            abort(403, 'Sorry, not allowed');
        }


        $region->delete();
        session()->flash('flash_message', 'Record successfully deleted!');
        return redirect('regions');
    }

}
