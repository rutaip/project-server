<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use App\Permission;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        $permissions = Permission::latest()->get();

        /* if  (Gate::denies('show-permissions', $permissions)){
 
             abort(403, 'Sorry, but no sorry');
         }*/

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {

        return view('permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create($request->all());
        //Session::flash('flash_message', 'Registro creado correctamente!');
        return redirect('permissions');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.show', compact('permission'));
    }


    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->update($request->all());

        return redirect('permissions');
    }



}
