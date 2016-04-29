<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PmRequest;
use App\Http\Controllers\Controller;
use App\Pm;
use Illuminate\Http\Request;
use DB;
use Gate;

class PmsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $pms = Pm::latest()->get();

        if  (Gate::denies('poms', $pms)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('pms.index', compact('pms'));
    }

    public function create()
    {
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');

        return view('pms.create', compact('region'));
    }

    public function store(PmRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        Pm::create($request->all());
        session()->flash('flash_message', 'Record successfully created!');
        return redirect('pms');
    }

    public function edit($id)
    {
        $pm = Pm::findOrFail($id);

        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');

        return view('pms.edit', compact('pm', 'region'));
    }

    public function update(PmRequest $request, $id)
    {
        $pm = Pm::findOrFail($id);

        if  (Gate::denies('edit', $pm)) {

            abort(403, 'Sorry, not allowed');
        }

        $pm->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('pms');
    }

    public function destroy($id)
    {
        $pm = Pm::findOrFail($id);

        if  (Gate::denies('delete', $pm)) {

            abort(403, 'Sorry, not allowed');
        }

        $pm->delete();
        session()->flash('flash_message', 'Record successfully deleted!');
        return redirect('pms');
    }


}
