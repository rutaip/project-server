<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Http\Request;
use DB;
use Gate;
use Countries;

class CustomersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $customers = Customer::latest()->get();

        if  (Gate::denies('customers', $customers)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $countries = Countries::lists('name', 'name');

        return view('customers.create', compact('region', 'countries'));
    }

    public function store(CustomerRequest $request)
    {
        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        Customer::create($request->all());
        //Session::flash('flash_message', 'Registro creado correctamente!');
        return redirect('customers');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $countries = Countries::lists('name', 'name');
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');

        return view('customers.edit', compact('customer', 'region', 'countries'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        if  (Gate::denies('edit', $customer)) {

            abort(403, 'Sorry, not allowed');
        }

        $customer->update($request->all());

        return redirect('customers');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if  (Gate::denies('delete', $customer)) {

            abort(403, 'Sorry, not allowed');
        }

        $customer->delete();

        return redirect('customers');
    }
}
