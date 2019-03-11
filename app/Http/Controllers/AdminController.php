<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;

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
    	$contest->date = $request->input('contestDate');
    	$contest->time = $request->input('contestTime');
    	$contest->prize_pool = $request->input('prizePool');
    	$contest->entry_fee = $request->input('entryFee');
    	$contest->per_kill = $request->input('perKill');
    	$contest->rank_1 = $request->input('rank1');
    	$contest->rank_2 = $request->input('rank2');
    	$contest->rank_3 = $request->input('rank3');
    	$contest->rank_4 = $request->input('rank4');
    	$contest->rank_5 = $request->input('rank5');
    	$contest->no_of_teams = $request->input('noOfTeams');

    	if($contest->save()) {
    		
    	} else {

    	}

    	return redirect('/createcontest');

    }

}
