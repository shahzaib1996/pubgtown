<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    public function index() {
    	return view('admin.index');
    }

    public function newContest() {
    	return view('admin.create_contest');
    }
    public function createContest(Request $request) {
    	$contest = new Contest;

    	$contest->type = $request->input('type');
    	$contest->map = $request->input('map');
    	$contest->contest_date = $request->input('contestDate');
    	$contest->contest_time = Carbon::parse($request->input('contestTime'));
    	$contest->prize_pool = $request->input('prizePool');
    	$contest->entry_fee = $request->input('entryFee');
    	$contest->per_kill = $request->input('perKill');
    	$contest->rank_1 = $request->input('rank1');
    	$contest->rank_2 = $request->input('rank2');
    	$contest->rank_3 = $request->input('rank3');
    	$contest->rank_4 = $request->input('rank4');
    	$contest->rank_5 = $request->input('rank5');
        $contest->no_of_teams = $request->input('noOfTeams');
    	$contest->total_collection = $request->input('totalCollection');

    	if($contest->save()) {
            session()->flash('message','Success! Contest created.');
            session()->flash('class','alert-success');
    		
    	} else {
            session()->flash('message','Opps! Failed to create contest.');
            session()->flash('class','alert-danger');
    	}

    	return redirect('admin/contest/new');

    }

    public function updateContest(Request $request) {
        $contest = Contest::find($request->input('id'));

        $contest->type = $request->input('type');
        $contest->map = $request->input('map');
        $contest->contest_date = $request->input('contestDate');
        $contest->contest_time = Carbon::parse($request->input('contestTime'));
        $contest->prize_pool = $request->input('prizePool');
        $contest->entry_fee = $request->input('entryFee');
        $contest->per_kill = $request->input('perKill');
        $contest->rank_1 = $request->input('rank1');
        $contest->rank_2 = $request->input('rank2');
        $contest->rank_3 = $request->input('rank3');
        $contest->rank_4 = $request->input('rank4');
        $contest->rank_5 = $request->input('rank5');
        $contest->no_of_teams = $request->input('noOfTeams');
        $contest->total_collection = $request->input('totalCollection');

        if($contest->save()) {
            session()->flash('message','Success! Contest updated.');
            session()->flash('class','alert-success');
            
        } else {
            session()->flash('message','Opps! Failed to update contest.');
            session()->flash('class','alert-danger');
        }

        return redirect('admin/contest/edit/'.$request->input('id'));

    }

    public function contests() {
        $data['contests'] = Contest::where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('admin.show_contests',$data);
    }

    public function editContest($id) {
        $data['contest'] = Contest::find($id);
        if($data['contest']->is_active == 0) {
            session()->flash('message','Contest is closed!');
            session()->flash('class','alert-danger');
            $data['contest'] = '';
            return view('admin.edit_contest',$data);
        }
        return view('admin.edit_contest',$data);
    }

    public function deleteContest($id) {
        $contest = Contest::where('is_active',1)->find($id);
        if(isset($contest)){
            $contest->delete();
            session()->flash('message','Contest is deleted!');
            session()->flash('class','alert-success');
            return redirect('admin/contests');
        } else {
            session()->flash('message','Opps! Failed to delete contest');
            session()->flash('class','alert-danger');
            return redirect('admin/contests');
        }
    }

}
