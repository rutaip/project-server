<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Region;
use App\Role;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Auth;
use Mail;
use Gate;
use App\Http\Controllers\Controller;
use App\Notification;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {

        $users = User::latest()->get();

        if  (Gate::denies('users', $users)) {

            abort(403, 'Sorry, not allowed');
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $regions = Region::latest()->lists('region','id');
        $roles = Role::latest()->lists('label','name');
        return view('users.create', compact('regions', 'roles'));
    }

    public function store(UserRequest $data)
    {
        if  (Gate::denies('create', $data)) {

            abort(403, 'Sorry, not allowed');
        }

        $notification=array();
        $notification[]=2;
        $notification[]=5;
        $notification[]=8;
        $notification[]=11;
        $notification[]=14;
        $notification[]=17;

       $user = User::create([
           'name' => $data['name'],
           'last' => $data['last'],
           'email' => $data['email'],
           'region_id' => $data['region_id'],
           'password' => bcrypt($data['password']),
       ]);


        $user->assignRole($data->role);

        $user->notifications()->sync($notification);


        Mail::send('emails.newuser', ['user' => $user, 'password' => $data['password']], function ($m) use ($user) {
            $m->from('project@presenceco.com', 'Presence Project Server');

            $m->to($user->email, $user->name.' '.$user->last )->subject('Welcome Presence Project Server');
        });
        
        session()->flash('flash_message', 'Record successfully created!');
        return redirect('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }


    public function edit($id)
    {

        $regions = Region::latest()->lists('region','id');
        $roles = Role::latest()->lists('label','name');

        $user = User::findOrFail($id);


        return view('users.edit', compact('user', 'regions', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if  (Gate::denies('edit', $user)) {

            abort(403, 'Sorry, not allowed');
        }

        $user->update($request->all());

        $user->roles()->detach();

        $user->assignRole($request->role);
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('users');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if  (Gate::denies('delete', $user)) {

            abort(403, 'Sorry, not allowed');
        }

        $user->delete();
        session()->flash('flash_message', 'Record successfully deleted!');
        return redirect('users');
    }

}
