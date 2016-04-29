<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AcdRequest;
use App\Http\Controllers\Controller;
use App\Acd;
//use Illuminate\Http\Request;
//use Request;
use Route;
use Gate;

class AcdsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $acds = Acd::latest()->get();

        if  (Gate::denies('acds', $acds)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('acds.index', compact('acds'));
    }

    public function create()
    {
        return view('acds.create');
    }

    public function store(AcdRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        Acd::create($request->all());
        session()->flash('flash_message', 'Record successfully created!');
        return redirect('acds');
    }

    public function show($id)
    {
        $acd = Acd::findOrFail($id);

        return view('acds.show', compact('acd'));
    }


    public function edit($id)
    {
        $acd = Acd::findOrFail($id);
        session()->flash('flash_message', 'Record successfully updated!');
        return view('acds.edit', compact('acd'));
    }

}
