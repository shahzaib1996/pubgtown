<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use Carbon\Carbon;
use Auth;
use App\Withdraw;
use App\User;
use App\Contact;
use App\WebSetting;
use App\Deposit;
use App\ContestPlayer;
use Illuminate\Support\Facades\Route;


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

    public function joinContestView($id) {
      $contest = Contest::where('id',$id)->get(['id']);
      if(count($contest) == 1) {
        return view('user.user_join_contest',['contest_id'=>$id]);
      } else {
        return "No Contest";
      }
    }

    public function joinContestNew(Request $request,$id) {
      $user_id = Auth::user()->id;
      $contest = Contest::where('id',$id)->get(['no_of_teams'])->first();
      // return $contest->no_of_teams;
      $contest_players = ContestPlayer::where('contest_id',$id)->count(); // check contest no of teams
      return $contest_players < $contest->no_of_teams ? "Join" : "Full";
      $user_contest = ContestPlayer::where('contest_id',$id)->where('user_id',$user_id)->count(['id']); // check if player already joined
      // return $contest_player;
      if( $user_contest == 0) {
        $user_nick = $request->input('user_nick');
        try{
          ContestPlayer::create([
            'contest_id' => $contest_id,
            'user_id' => $user_id,
            'user_join_nick' => $user_nick
          ]);
          User::where('id',$user_id)
            ->update([
                'nick' => $user_nick
          ]); 
          session()->flash('message','Yup! You have joined the contest!');
          session()->flash('class','alert-succces');
        } catch(\Exception $e) {
          session()->flash('message','Opps! Something Went Wrong.');
          session()->flash('class','alert-danger');
        }
        return redirect('/contest/'.$id);
      } else {
        session()->flash('message','Opps! You have already joined this contest.');
        session()->flash('class','alert-danger');
        return redirect('/contest/'.$id);
      }
    }

    public function showMenu() {
      // return Route::currentRouteName(); //use Illuminate\Support\Facades\Route;
      return view('user.menu');  
    }

    public function showUserProfile() {
      return view('user.user_profile');  
    }

    public function updateUserProfile(Request $request) {
      $user = Auth::user();
      $user->name = $request->input('name');
      $user->nick = $request->input('nick');
      $user->mobile = $request->input('mobile');
      if($user->save()) {
        session()->flash('message','Successfully Updated!');
        session()->flash('class','alert-success');
      } else {
        session()->flash('message','Failed Update!');
        session()->flash('class','alert-success');
      }
      return redirect('/profile');  
    }

    public function showPrivacyPolicy() {
      return view('user.policy');
    }

    public function showTermsOfUse() {
      return view('user.terms');
    }

    public function withdrawRequest() {
      $data['withdraw_history'] = Withdraw::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get();
      return view('user.withdraw_request',$data);
    }

    public function createWithdrawRequest(Request $request) {
      $user_balance = Auth::user()->balance;
      $amount = $request->input('amount');
      $mobile = $request->input('mobile');

      if( $amount < WebSetting::where('id',1)->get(['min_withdraw_limit'])[0]->min_withdraw_limit ) {
        session()->flash('message','Opps! Requested amount is less than minimum withdraw limit.');
        session()->flash('class','alert-danger');
        return redirect('/withdraw');
      }

      if( $amount <= $user_balance ) {

        $withdraw = new Withdraw;
        $withdraw->user_id = Auth::user()->id;
        $withdraw->amount = $amount;
        $withdraw->status = 0; // 0 = pending

        $user = Auth::user();
        $user->balance = ($user->balance)-($amount);
        $user->mobile = $mobile;

        if($withdraw->save() && $user->save()) {
          session()->flash('message','Yup! Withdraw of Rs.'.$amount.' has been requested.');
          session()->flash('class','alert-success');
          return redirect('/withdraw');
        } else {
          session()->flash('message','Opps! Failed to withdraw.');
          session()->flash('class','alert-danger');
          return redirect('/withdraw');
        }

      }
      session()->flash('message','Opps! Insufficient balance.');
      session()->flash('class','alert-danger');
      return redirect('/withdraw');
    }

    public function notLoginPage() {
       if(Auth::check()){
          return redirect('/');
       } else {
          return view('user.not_login');
       }
    }

    public function showContact() {
      return view('user.contact');
    }

    public function createContact(Request $request) {
      
      $contact =  new Contact;
      $contact->name = $request->input('name');
      $contact->mobile = $request->input('mobile');
      $contact->email = $request->input('email');
      $contact->message = $request->input('message');

      if($contact->save()) {
        session()->flash('message','Your request has been submitted! You will be contacted through email soon.');
        session()->flash('class','alert-success');
      } else {
        session()->flash('message','Failed to Contact!');
        session()->flash('class','alert-danger');
      }

      return redirect('/contact');

    } 

    public function showAboutUs() {
      return view('user.about_us');
    }

    public function userContests() {
      $data['user_contests'] = User::find(Auth::user()->id)->contest_player;
      return view('user.user_contests',$data);
    }

    public function depositRequest() {
      $data['easypaisa_account'] = WebSetting::where('id',1)->get(['easy_paisa_account'])[0]->easy_paisa_account;
      $data['jazzcash_account'] = WebSetting::where('id',1)->get(['jazz_cash_account'])[0]->jazz_cash_account;
      $data['deposit_history'] = Deposit::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get();
      return view('user.deposit_request',$data);
    }

    public function createDepositRequest(Request $request) {
      
      $amount = $request->input('amount');
      $trans_id = $request->input('transaction_id');
      $message = $request->input('message');

      if( $amount != '' ) {

        $deposit = new Deposit;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $amount;
        $deposit->transaction_id = $trans_id;
        $deposit->user_message = $message; 
        $deposit->approve_status = 0; // 0 = pending


        if( $deposit->save() ) {
          session()->flash('message','Yup! Rs.'.$amount.' will be credited into your account after verification..');
          session()->flash('class','alert-success');
          return redirect('/deposit');
        } else {
          session()->flash('message','Opps! Failed to submit.');
          session()->flash('class','alert-danger');
          return redirect('/deposit');
        }

      }
      session()->flash('message','Opps! Something went wrong.');
      session()->flash('class','alert-danger');
      return redirect('/deposit');
    }

    public function userBanned() {
      return view('user.banned_user');
    }
    

}
