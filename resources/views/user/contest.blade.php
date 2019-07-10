@extends('user.layouts.app')

@section('content')

        <!-- contest list start -->
        <section class="list-contests">

        @if($contest)
          


        @if(session()->has('message'))
          <div class="alert {{session('class')}}">{{session('message')}}</div>
        @endif

          @if( $contest->show_room_details == 1 )

            @foreach($contest->contest_player as $player)
              @if( Auth::user()->id == $player->user_id )
              <div class="alert alert-success m-t-20 "> <center> <b> Room Information </b> <br> ID: {{$contest->room_id}} <br> Pass: {{$contest->room_id}} </center> </div>
              @endif

            @endforeach
          @endif
         <!-- Contest Box Start -->
          <div class="contest-box">
            <div class="map">
              <div class="mimage">
                <img src="{{ asset('user/images/erangel.jpg') }}" class="" height="150px" width="150px">
              </div>
            </div>

            <div class="contest-details">

              <div class="cdc1 flex-sb-c relative">
                <div class="t-l">
                  <div class="lightgrey f13">Prize Pool</div>
                  <div class="black f14 strong op-8">Rs {{$contest->prize_pool}}</div>
                </div>
                <div class="t-c">
                  <div class="lightgrey f13">Per Kill</div>
                  <div class="black f14 strong op-8">Rs {{$contest->per_kill}}</div>
                </div>
                <div class="t-r">
                  <div class="lightgrey f13">Entry</div>
                  <div class="black f14 strong op-8">Rs {{$contest->entry_fee}}</div>
                </div>
              </div>

              <div class="cdc2 flex-sb-c relative f13 m-t-10">
                <span class="strong blue capitalize">{{$contest->map}}</span>
                <span class="strong dark-orange">{{Carbon\Carbon::parse($contest->contest_date)->isoformat('MMM D, dddd')}}</span>
                <span class="strong dark-orange">{{Carbon\Carbon::parse($contest->contest_time)->isoformat('h:mm a')}}</span>
                <span class="strong blue capitalize ">{{$contest->type}}</span>
              </div>

              <div class="cdc3 relative f12 m-t-10">
                <div class="progress h-5-i">
                  <div class="progress-bar bg-warning bg-dark-orange" role="progressbar" style="width: {{count($contest->contest_player)}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="f13 flex-sb-c m-t-5">
                  <span>{{ count($contest->contest_player) }}/{{$contest->no_of_teams}} Teams</span> 
                  @if($contest->is_active == 1)
                  <a class="btn btn-sm btn-success f13 fw" href="{{route('join.contest',['id'=>$contest->id])}}">Join Now</a> 
                  @elseif($contest->is_active == 0)
                  <button class="btn btn-sm btn-success f13" disabled>Closed</button> 
                  @elseif($contest->is_active == 2)
                  <button class="btn btn-sm btn-danger f13">LIVE</button>
                  @endif                
                </div>
                
              </div>

            </div>

          </div><!-- Contest Box End -->

          <div class="tabs-box">

            <ul class="nav nav-tabs f-roboto f14" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="prize-tab" data-toggle="tab" href="#prize" role="tab" aria-controls="prize" aria-selected="false">Prize</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="leaderboard-tab" data-toggle="tab" href="#leaderboard" role="tab" aria-controls="leaderboard" aria-selected="false">Leaderboard</a>
              </li>
            </ul>
            <div class="tab-content p-10 border-left border-right border-bottom bg-white-i m-b-20" id="myTabContent">

              <div class="tab-pane fade show active m-t-10 " id="about" role="tabpanel" aria-labelledby="about-tab">

                <div class="f-roboto grey f13">
                  In the game, up to one hundred players parachute onto an island and scavenge for weapons and equipment to kill others while avoiding getting killed themselves. The available safe area of the game's map decreases in size over time, directing surviving players into tighter areas to force encounters. The last player or team standing wins the round.
                </div>

                <div class="m-t-20 strong f-roboto f13 grey">How to Play</div>

                <ul class="m-t-10 p-0-0-0-20 f13 f-roboto grey">

                  <li>
                    Deposit amount in your account 
                  </li>

                  <li>
                    Click on "Join Now" button and follow the instructions.
                  </li>
                  <li>
                    To join the contest, open PUBG in your mobile (at the specified time) and click on Room/Home Icon on the left side (just below map) and enter Room ID & Password
                  </li>

                  <!-- <li>
                    Room ID and Password will be shared with you on your email ID and mobile number 15 mins before contest start time.
                  </li> -->

                  <li>

                    Room ID and Password will also appear on top of this page 15 mins before contest start time. If it doesn't appear, make sure that you have logged in and refresh the page.
                  </li>
                  <li>
                    If you face any difficulty in joining the contest, write to us at info@newpubgtown.com
                  </li>
                  
                </ul>

                <div class="m-t-20 strong f-roboto f13 grey">Terms & Conditions</div>

                <ul class="m-t-10 p-0-0-0-20 f13 f-roboto grey">
                  <li>

                    You abide by our  <a href="{{route('terms.of.use')}}" style="color:blue;"> terms of use </a> by joining this.
                  </li>
                  <li>
                    Teaming with other players or unregistered players entering room will result in permanent ban from further contests
                  </li>
                  <li>
                    Only mobile phones are allowed, no Emulators are allowed.
                  </li>
                  <li>
                    PUBGTown has right to remove any participant at its sole discretion to ensure fairplay
                  </li>
                  <li>
                    PUBGTown has right to remove any participant whose linked PUBGTown username is incorrect
                  </li>
                  <li>
                    You are requested to join the room before match start time
                  </li>
                  <li>
                    Joining fees is completely non-refundable
                  </li>
                  
                  
                </ul>


              </div>

              <div class="tab-pane fade" id="prize" role="tabpanel" aria-labelledby="prize-tab">

                <table class="table f13 f-roboto">
                  
                  <tbody>
                    <tr class="bg-lightgrey white no-border">
                      <td class="no-border">Teams</td>
                      <td class="no-border">Prize</td>
                    </tr>
                    <tr>
                      <td>Rank #1</td>
                      <td>Rs. {{$contest->rank_1}}</td>
                    </tr>
                    <tr>
                      <td >Rank #2</td>
                      <td>Rs. {{$contest->rank_2}}</td>
                    </tr>
                    <tr>
                      <td >Rank #3</td>
                      <td>Rs. {{$contest->rank_3}}</td>
                    </tr>
                    <tr>
                      <td >Rank #4</td>
                      <td>Rs. {{$contest->rank_4}}</td>
                    </tr>
                    <tr>
                      <td >Rank #5</td>
                      <td>Rs. {{$contest->rank_5}}</td>
                    </tr>
                    <tr>
                      <td >Per Kill</td>
                      <td>Rs. {{$contest->per_kill}}/kill</td>
                    </tr>
                  </tbody>
                </table>

                <div class="m-t-20 t-c f-roboto f13 grey">
                  Prize money will be credited to your account within 4 to 5 hours after reviewing the match through our unique ACHS (Anti Cheat & Hack System)
                </div>

                <div class="m-t-20 t-c f-roboto f13 grey">
                  If the prize money is not credited in your account, write to us at support@newpubgtown.com mentioning your username,pubg username, email and mobile number along with the contest date.
                </div>


              </div>

              <div class="tab-pane fade" id="leaderboard" role="tabpanel" aria-labelledby="leaderboard-tab">

                <table class="table f13 f-roboto">
                  
                  <tbody class="align-middle black">
                    <tr class="bg-lightgrey white no-border">
                      <td class="no-border" colspan="2">Teams</td>
                      <td class="no-border">Kills</td>
                      <td class="no-border">Rank</td>
                    </tr>

                    @if( count($contest->contest_player) ) 

                    @foreach($contest->contest_player as $player)
                      <tr>
                        <td width="64px">
                          <img src="{{$player->user->avatar}}" class="w-40 h-40 circular">
                        </td>
                        <td>{{$player->user->name}} <br> <span class="grey">{{$player->user->nick}}</span> </td>
                        <td width="50px"> <span class="red"> @if($contest->is_active != 1 ) {{$player->kills}} @else - @endif</span> </td>
                        <td width="100px">@if($contest->is_active != 1 ) #{{$player->rank}} @else - @endif <br> <span class="green">@if($contest->is_active != 1 ) Rs. {{$player->pay_total_prize}} @else - @endif</span> </td>
                      </tr>
                    @endforeach

                    @else

                      <tr>
                        <td class="t-c f-roboto f13" colspan="4">No Player joined this contest yet!</td>
                      </tr>

                    @endif
                    
                    
                  </tbody>
                </table>

              </div>

            </div>
            
          </div>

          @else
            
            <div class="m-t-20 m-b-50 t-c f-roboto f13 grey">
                  <img src="{{asset('user/images/n-f.png')}}" style="width: 50px;height: auto;"> <br>
                  Invalid Contest Page
                </div>

        @endif

          
        </section>

@endsection