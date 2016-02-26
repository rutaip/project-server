<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $projects = Project::where('user_id', 'LIKE', '%'.$login->id.'%')
                            ->where('master_status', '=', 'Working' )
                            ->where('created_at', '>=', Carbon::now()->startOfYear())->count();

        $projectsbyregion = Project::join('regions', 'projects.region_id', '=', 'regions.id')
                            ->select('projects.region_id', 'regions.region as region', 'regions.color as color', DB::raw('count(projects.id) as total'))
                            ->where('projects.created_at', '>=', Carbon::now()->startOfYear())
                            ->groupBy('region_id')
                            ->get();

        $projectsbymonth = Project::select(DB::raw('count(id) as totalp'), DB::raw('MONTH(original_date) as month'), DB::raw('MONTHNAME(original_date) as monthname'))
            ->where('projects.created_at', '>=', Carbon::now()->startOfYear())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

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

        return view('dashboard.index', compact('projects', 'projectsbyregion', 'projectsbystatus'))
            ->with('totals', $projectsbyregion->lists('total'))
            ->with('colors', $projectsbyregion->lists('color'))
            ->with('regions', $projectsbyregion->lists('region'))
            ->with('months', $projectsbymonth->lists('monthname'))
            ->with('totalp', $projectsbymonth->lists('totalp'))
            ->with('pilot_monthname', $pilotsbymonth->lists('pilot_monthname'))
            ->with('pilot_total', $pilotsbymonth->lists('pilot_total'))
            ;
    }
}
