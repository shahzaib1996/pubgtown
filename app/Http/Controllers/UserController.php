<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','check_user']);
    }

    public function contests_old() {
    	$data['contests'] = Contest::orderBy('id','desc')->get();
    	// return $data;
    	return view('user.index',$data);
    }

    public function contest($id) {
      $data['contest'] = Contest::where('is_deleted',0)->find($id);
      // return $data;
    	return view('user.contest',$data);
    }

    public function contests(Request $request){
        $contests=Contest::orderBy('id','desc')->paginate(4);
        $html='';
        foreach ($contests as $contest) {
            $html.='<a href="contest/'.$contest->id.'" class="context-box-anchor">
            <div class="contest-box">
            <div class="map">
              <div class="mimage">
                <img src="'.asset('user/images/erangel.jpg').'" height="150px" width="150px">
              </div>
            </div>

            <div class="contest-details">

              <div class="cdc1 flex-sb-c relative">
                <div class="t-l">
                  <div class="lightgrey f13">Prize Pool</div>
                  <div class="black f14 strong op-8">Rs '.$contest->prize_pool.'</div>
                </div>
                <div class="t-c">
                  <div class="lightgrey f13">Per Kill</div>
                  <div class="black f14 strong op-8">Rs '.$contest->per_kill.'</div>
                </div>
                <div class="t-r">
                  <div class="lightgrey f13">Entry</div>
                  <div class="black f14 strong op-8">Rs '.$contest->entry_fee.'</div>
                </div>
              </div>

              <div class="cdc2 flex-sb-c relative f13 m-t-10">
                <span class="strong blue capitalize">'.$contest->map.'</span>
                <span class="strong dark-orange">'.Carbon::parse($contest->contest_date)->isoformat('MMM D, dddd').'</span>
                <span class="strong dark-orange">'.Carbon::parse($contest->contest_time)->isoformat('h:mm a').'</span>
                <span class="strong blue capitalize ">'.$contest->type.'</span>
              </div>

              <div class="cdc3 relative f12 m-t-10">
                <div class="progress h-5-i">
                  <div class="progress-bar bg-dark-orange" role="progressbar" style="width: '.count($contest->contest_player).'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="f13 flex-sb-c m-t-5">
                  <span>'.count($contest->contest_player).'/'.$contest->no_of_teams.' Teams</span>';
                  
                  if($contest->is_active == 1){
                  $html.='<button class="btn btn-sm btn-success f13">Join Now</button>';
                  } else if($contest->is_active == 0) {
                  $html.='<button class="btn btn-sm btn-success f13" disabled>Closed</button>'; 
                  } else if($contest->is_active == 2) {
                  $html.='<button class="btn btn-sm btn-danger f13">LIVE</button>'; 
                  }
              $html.='
                </div>
              </div>
            </div>
          </div>
          </a>';

        }

        if ($request->ajax()) {
            return $html;
            // return ;
        }
        return view('user.index',compact('contests'));
    }

    public function userLogin() {
      return view('user.user_login');
    }

    public function joinContest($id) {
      return "Joined Contest: ".$id;
    }

    public function showMenu() {
      return view('user.menu');  
    }

    public function showProfile() {
      return view('user.user_profile');  
    }

}
