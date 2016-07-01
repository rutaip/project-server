<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Project;
use Gate;
use DB;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    
    
    
    public function github()
    {

        $auth_user=Auth::user();

        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');


        $projects = Project::where('master_status', '=', 'Working' )
            ->where('created_at', '>=', Carbon::now()->startOfYear());

        if  (Gate::denies('worldwide')) {

            $projects->where('user_id', 'LIKE', '%'.$auth_user->id.'%')
                ->orWhere('region_id', 'LIKE', '%'.$auth_user->region_id.'%');

        }

        $projects = $projects->latest()->get();

        return \PDF::loadView('projects.index', compact('region', 'projects'))->stream('projects.pdf');
        
       // return \PDF::loadFile('http://project.app/projects')->stream('github.pdf');
    }
}
