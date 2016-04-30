<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

use App\Http\Requests;

class NotificationsController extends Controller
{
    public function store(Request $request)
    {
        $user=User::find(Auth::user()->id);

        $notification=array();
        $notification[]=$request->project_new;
        $notification[]=$request->project_update;
        $notification[]=$request->offering_new;
        $notification[]=$request->offering_update;
        $notification[]=$request->comments;
        $notification[]=$request->integration;




        $user->notifications()->sync($notification);

        session()->flash('flash_message', 'Settings updated!');

        return redirect('/');
    }
}
