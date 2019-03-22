<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use App\ContestPlayer;
use Carbon\Carbon;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','check_admin']);
    }

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

    public function contest($id) {
        $data['contest'] = Contest::where('is_deleted',0)->find($id);
        $data['contest']->contest_player;
        return view('admin.contest_details',$data);
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
            $contest->is_deleted = 1;
            $contest->save();
            session()->flash('message','Contest is deleted!');
            session()->flash('class','alert-success');
            return redirect('admin/contests');
        } else {
            session()->flash('message','Opps! Failed to delete contest');
            session()->flash('class','alert-danger');
            return redirect('admin/contests');
        }
    }

    public function closeContest($id) {
        $data['contest'] = Contest::where('is_deleted',0)->find($id);
        if($data['contest']) {   
            $data['contest']->contest_player;
            return view('admin.close_contest',$data);
        } else {
            $data['contest'] ='';
            session()->flash('message','Contest does not Exist!');
            session()->flash('class','alert-danger');
            return view('admin.close_contest',$data);
        }
    }

    public function closingContest($id) { //in process
        $contest = Contest::find($id);
        if($contest->is_active == 1 && $contest->is_deleted == 0) {

            Contest::where('id', $id)
            ->update([ 
                'is_active' => 0
            ]);

            session()->flash('message','Contest is closed now');
            session()->flash('class','alert-success');
            return redirect('admin/contest/close/'.$id);
        } else if($contest->is_active == 0 && $contest->is_deleted == 0){
            Contest::where('id', $id)
            ->update([ 
                'is_active' => 1
            ]);

            session()->flash('message','Contest is active now');
            session()->flash('class','alert-success');
            return redirect('admin/contest/close/'.$id);
        } else {
            session()->flash('message','Contest is deleted');
            session()->flash('class','alert-danger');
            return redirect('admin/contest/close/'.$id);
        }

    }

    public function updatePlayer($id,Request $request) {
        $contest = Contest::find($id);
        if($contest->is_active == 1 && $contest->is_deleted == 0) {
            $user_id = $request->user_id;
            $rank = $request->rank;
            $kills = $request->kills;
            $prize = $request->prize;
            $total_prize = $request->total_prize;
            for($i=0;$i<count($user_id);$i++) {
                ContestPlayer::where('contest_id', $id)
                ->where('user_id', $user_id[$i])
                ->update([ 
                    'rank' => $rank[$i],
                    'kills' => $kills[$i],
                    'prize' => $prize[$i],
                    'pay_total_prize' => $total_prize[$i]
                ]);
            }

            session()->flash('message','Players Details has been updated');
            session()->flash('class','alert-success');
            return redirect('admin/contest/close/'.$id);
        } 
        session()->flash('message','Failed to Updated Players Details');
        session()->flash('class','alert-danger');
        return redirect('admin/contest/close/'.$id);
    }

    public function payPlayerPrize(Request $request) {
        ContestPlayer::where('contest_id', $request->contest_id)
        ->where('user_id', $request->player_id)
        ->update([ 
            'check_prize' => 1
        ]);
        return "1";
    }

    public function players() {
        $data['players'] = User::where('is_admin',0)->get();
        return view('admin.show_players',$data);
    }

    public function player($id) {
        $data['player'] = User::where('is_admin',0)->find($id);
        $data['player']->contest_player;
        return view('admin.player_details',$data);
    }

    public function testing() {
        // $contests =  ContestPlayer::find(1);
        $contests =  Contest::find(1);
        // $contests->contest_player;
        // return $contests->contest_player->user;
        // $contests->
        return $contests;
    }

}
