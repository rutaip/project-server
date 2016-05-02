<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\OfferingRequest;
use App\Offering;
use App\Comment;
use Auth;
use DB;
use Gate;
use Carbon\Carbon;
use App\Invoice;
use Countries;
use App\Notification;
use Mail;

class OfferingsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        parent::__construct();

    }

    public function index()
    {

        $auth_user=Auth::user();

        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');


        $offerings = Offering::where('master_status', '=', 'offering' )
            ->where('created_at', '>=', Carbon::now()->startOfYear());

        if  (Gate::denies('worldwide')) {

            $offerings->where('user_id', 'LIKE', '%'.$auth_user->id.'%')
                ->orWhere('region_id', 'LIKE', '%'.$auth_user->region_id.'%');

        }

        $offerings = $offerings->latest()->get();

        return view('offerings.index', compact('offerings', 'region'));
    }

    public function show($id)
    {
        $offering = Offering::findOrFail($id);
        $comments_count = Comment::where('offering_id', $id)->count();
        $modules = DB::table('modules')->orderBy('id', 'asc')->lists('name','name');


        return view('offerings.show',compact('offering', 'comments_count', 'modules'));
    }

    public function create()
    {
        $customer = DB::table('customers')->orderBy('id', 'asc')->lists('customer_name','id');
        $partner = DB::table('partners')->orderBy('partner_name', 'asc')->lists('partner_name','id');
        $project_managers = DB::table('pms')->select(DB::raw('concat (first," ",last) as full_name,id'))->orderBy('id', 'asc')->lists('full_name','id');
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $acd_type = DB::table('acds')->orderBy('id', 'asc')->lists('acd_type','id');
        $countries = Countries::orderBy('name')->lists('name', 'name');

        return view('offerings.create', compact('customer','partner','project_managers','region','acd_type', 'countries'));

    }

    public function store(OfferingRequest $request)
    {

        if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }

        if  (Gate::denies('create_offering', $request)) {

            abort(403, 'Sorry, not allowed');
        }
        $offering = Offering::create($request->all());

        $this->email('user_new_offering', $offering, 'Create');
        $this->email('region_new_offering', $offering, 'Create');
        $this->email('ww_new_offering', $offering, 'Create');


        session()->flash('flash_message', 'Record successfully created!');

        return redirect('offerings');
    }

    public function edit($id)
    {
        $customer = DB::table('customers')->orderBy('id', 'asc')->lists('customer_name','id');
        $partner = DB::table('partners')->orderBy('partner_name', 'asc')->lists('partner_name','id');
        $project_managers = DB::table('pms')->select(DB::raw('concat (first," ",last) as full_name,id'))->orderBy('id', 'asc')->lists('full_name','id');
        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $acd_type = DB::table('acds')->orderBy('id', 'asc')->lists('acd_type','id');
        $countries = Countries::orderBy('name')->lists('name', 'name');

        $offering = Offering::findOrFail($id);

        if (Gate::denies('edit-offering', $offering)){

            abort(403, 'Sorry, not allowed');
        }

        return view('offerings.edit',compact('offering','customer','partner','project_managers','region','acd_type', 'countries'));
    }

    public function update(OfferingRequest $request, $id)
    {
        $offering = Offering::findOrFail($id);

        /*if  (Gate::denies('edit', $role)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $offering->update($request->all());

        $this->email('user_update_offer', $offering, 'Update');
        $this->email('region_update_offer', $offering, 'Update');
        $this->email('ww_update_offer', $offering, 'Update');

        session()->flash('flash_message', 'Record successfully updated!');
        
        return redirect('offerings/'.$id);
    }

    public function search(Request $request)
    {

        $region = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');


        $offerings = Offering::where('created_at', '>=', Carbon::now()->startOfYear());


        /*filters form*/

        $offerings->where(function($query) use ($request){

            foreach ($request->region_id as $regions) {
                $query->orWhere('region_id', 'LIKE', '%'.$regions.'%');
            }

        });

        $offerings->where(function($query) use ($request){

            foreach ($request->master_status as $statuses){
                $query->orWhere('master_status', 'LIKE', '%'.$statuses.'%');
            }

        });

        $offerings = $offerings->latest()->get();
        /* end filter query */

        return view('offerings.index', compact('offerings', 'region'));
    }

    private function email($tag, $offering, $action){
        $notifications=Notification::where('name', $tag)->with('users')->get();

        $email= array();
        foreach ($notifications as $notification){
            foreach ($notification->users as $users){
                $email[] = $users->email;
            }
        }

        Mail::send('emails.offering_update', ['project' => $offering, 'action' => $action], function ($m) use ($email, $offering, $action) {
            $m->from('project@presenceco.com', 'Presence Project Server');

            $m->bcc($email)->subject('Offering ' . $offering->project_name . ' '.$action . ' - Presence Project Server');
        });
    }
}
