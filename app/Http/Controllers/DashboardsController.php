<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Project;
use App\Offering;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Gate;

class DashboardsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {
        //$customers = Customer::latest()->get();
        $login= Auth::user();


        $project_owner='';

        if  (Gate::denies('worldwide')) {

            $project_owner=$login->id;
        }



        $projects = Project::where('user_id', 'LIKE', '%'.$project_owner.'%')
                            ->where('master_status', '=', 'Working' )
                            ->where('created_at', '>=', Carbon::now()->startOfYear())->count();

        $projectsbyregion = Project::join('regions', 'projects.region_id', '=', 'regions.id')
                            ->select('projects.region_id', 'regions.region as label', 'regions.color as color', DB::raw('count(projects.id) as value'))
                            ->where('projects.created_at', '>=', Carbon::now()->startOfYear())
                            ->groupBy('region_id')
                            ->get();

        $comments = Comment::join('projects', 'comments.project_id', '=', 'projects.id')
                            ->select('projects.id', 'comments.comment_text', 'comments.created_at', 'comments.comment_owner', 'projects.project_name')
                            ->where('projects.user_id', 'LIKE', '%'.$project_owner.'%')
                            ->orderBy('comments.created_at', 'DESC')
                            ->limit(10)
                            ->paginate(2);

        $projectsbymonth = Project::select(DB::raw('count(id) as totalp'), DB::raw('MONTH(original_date) as month'), DB::raw('MONTHNAME(original_date) as monthname'))
            ->where('projects.created_at', '>=', Carbon::now()->startOfYear())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $closedpilots = Project::where('user_id', 'LIKE', '%'.$project_owner.'%')
            ->where('master_status', '=', 'Finished' )
            ->where('project_type_id', '=', '1')
            ->where('created_at', '>=', Carbon::now()->startOfYear())->count();

        $closedprojects = Project::where('user_id', 'LIKE', '%'.$project_owner.'%')
            ->where('master_status', '=', 'Finished' )
            ->where('project_type_id', '=', '2')
            ->where('created_at', '>=', Carbon::now()->startOfYear())->count();

        $offerings = Offering::where('user_id', 'LIKE', '%'.$project_owner.'%')
            ->where('master_status', '=', 'offering' )
            ->where('created_at', '>=', Carbon::now()->startOfYear())->count();

        $projectsbystatus = Project::select(DB::raw('count(id) as value'), 'status as label')
            ->where('projects.created_at', '>=', Carbon::now()->startOfYear())
            ->groupBy('status')
            ->get();


        $pilotsbymonth = Project::select(DB::raw('count(id) as pilot_total'), DB::raw('MONTH(original_date) as month'), DB::raw('MONTHNAME(original_date) as pilot_monthname'))
            ->where('projects.created_at', '>=', Carbon::now()->startOfYear())
            ->where('project_type_id', '=', '1')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard.index', compact('projects', 'projectsbyregion', 'projectsbystatus', 'comments', 'closedpilots', 'closedprojects', 'offerings'))
            ->with('months', $projectsbymonth->lists('monthname'))
            ->with('totalp', $projectsbymonth->lists('totalp'))
            ->with('pilot_monthname', $pilotsbymonth->lists('pilot_monthname'))
            ->with('pilot_total', $pilotsbymonth->lists('pilot_total'))
            ;
    }
}
