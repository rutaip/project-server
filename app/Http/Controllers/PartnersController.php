<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PartnerRequest;
use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use DB;
use Gate;
use Countries;

class PartnersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {

        $partners = Partner::latest()->get();

        if  (Gate::denies('partners', $partners)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $countries = Countries::orderBy('name')->lists('name', 'name');

        return view('partners.create', compact('region', 'countries'));
    }

    public function store(PartnerRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        Partner::create($request->all());

        session()->flash('flash_message', 'Record successfully created!');
        return redirect('partners');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        $countries = Countries::lists('name', 'name');
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');

        return view('partners.edit', compact('partner', 'region', 'countries'));
    }

    public function update(PartnerRequest $request, $id)
    {
        $partner = Partner::findOrFail($id);

        if  (Gate::denies('edit', $partner)) {

            abort(403, 'Sorry, not allowed');
        }

        $partner->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('partners');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        if  (Gate::denies('delete', $partner)) {

            abort(403, 'Sorry, not allowed');
        }
        session()->flash('flash_message', 'Record successfully updated!');
        $partner->delete();

        return redirect('partners');
    }
}
