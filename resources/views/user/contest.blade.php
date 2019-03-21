@extends('user.layouts.app')

@section('content')

        <!-- contest list start -->
        <section class="list-contests">

          <div class="alert alert-success m-t-20 hide">Room ID: ThisIsRoomID <br> Room Pass: 123456</div>

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
                  <div class="black f14 strong op-8">Rs 7000</div>
                </div>
                <div class="t-c">
                  <div class="lightgrey f13">Per Kill</div>
                  <div class="black f14 strong op-8">Rs 50</div>
                </div>
                <div class="t-r">
                  <div class="lightgrey f13">Entry</div>
                  <div class="black f14 strong op-8">Rs 100</div>
                </div>
              </div>

              <div class="cdc2 flex-sb-c relative f13 m-t-10">
                <span class="strong blue capitalize">erangel</span>
                <span class="strong dark-orange">Mar 4, Monday</span>
                <span class="strong dark-orange">10:00 PM</span>
                <span class="strong blue capitalize ">solo</span>
              </div>

              <div class="cdc3 relative f12 m-t-10">
                <div class="progress h-5-i">
                  <div class="progress-bar bg-warning bg-dark-orange" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="f13 flex-sb-c m-t-5">
                  <span>30/100 Teams</span> 
                  <button _ngcontent-c3="" class="btn btn-sm btn-success f13">Join Now</button>                 
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
                    Click on "Join Now" button and pay the entry fee to register in the contest
                  </li>
                  <li>
                    To join the contest, open PUBG in your mobile (at the specified time) and click on Room/Home Icon on the left side (just below map) and enter Room ID & Password
                  </li>

                  <li>
                    Room ID and Password will be shared with you on your email ID and mobile number 15 mins before contest start time.
                  </li>

                  <li>

                    Room ID and Password will also appear on top of this page 15 mins before contest start time. If it doesn't appear, make sure that you have logged in and refresh the page.
                  </li>
                  <li>
                    If you face any difficulty in joining the contest, write to us at info@pubgtown.com
                  </li>
                  
                </ul>

                <div class="m-t-20 strong f-roboto f13 grey">Terms & Conditions</div>

                <ul class="m-t-10 p-0-0-0-20 f13 f-roboto grey">
                  <li>

                    You abide by our terms of use ( pubgpur.com/terms-of-use) by joining this term
                  </li>
                  <li>
                    Teaming with other players or unregistered players entering room will result in permanent ban from further contests
                  </li>
                  <li>
                    Only mobile phones are allowed, no Emulators or Tablets.
                  </li>
                  <li>
                    PUBGpur has right to remove any participant at its sole discretion to ensure fairplay
                  </li>
                  <li>
                    PUBGpur has right to remove any participant whose linked PUBGpur username is incorrect
                  </li>
                  <li>
                    You are requested to join the room before match start time
                  </li>
                  <li>
                    Joining fees is completely non-refundable
                  </li>
                  <li>
                    Prize money can only be transfered to linked PayTM account
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
                      <td>Rs. 1000</td>
                    </tr>
                    <tr>
                      <td >Rank #2</td>
                      <td>Rs. 500</td>
                    </tr>
                    <tr>
                      <td >Rank #3</td>
                      <td>Rs. 300</td>
                    </tr>
                    <tr>
                      <td >Rank #4</td>
                      <td>Rs. 100</td>
                    </tr>
                    <tr>
                      <td >Rank #5</td>
                      <td>Rs. 100</td>
                    </tr>
                    <tr>
                      <td >Per Kill</td>
                      <td>Rs. 50/kill</td>
                    </tr>
                  </tbody>
                </table>

                <div class="m-t-20 t-c f-roboto f13 grey">
                  Prize money will be transferred to your linked PayTM account within 4 hours after reviewing the match through our unique ACHS (Anti Cheat & Hack System)
                </div>

                <div class="m-t-20 t-c f-roboto f13 grey">
                  If the prize money is not credited in your PayTM account, write to us at support@pubgpur.com mentioning your username and mobile number along with the contest date.
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
                    <tr>
                      <td width="64px">
                        <img src="{{ asset('user/images/facebook.png') }}" class="w-40 h-40 circular">
                      </td>
                      <td>Shahzaib <br> <span class="grey">Eagle</span> </td>
                      <td width="50px"> <span class="red">10</span> </td>
                      <td width="100px">#1 <br> <span class="green">Rs. 1000</span> </td>
                    </tr>
                    <tr>
                      <td width="64px">
                        <img src="{{ asset('user/images/facebook.png') }}" class="w-40 h-40 circular">
                      </td>
                      <td>Testing Name <br> <span class="grey">Eagle</span> </td>
                      <td width="50px"> <span class="red">10</span> </td>
                      <td width="100px">#1 <br> <span class="green">Rs. 1000</span> </td>
                    </tr>
                    <tr>
                      <td width="64px">
                        <img src="{{ asset('user/images/facebook.png') }}" class="w-40 h-40 circular">
                      </td>
                      <td>Ahmed Ali <br> <span class="grey">Eagle</span> </td>
                      <td width="50px"> <span class="red">10</span> </td>
                      <td width="100px">#1 <br> <span class="green">Rs. 1000</span> </td>
                    </tr>
                    
                  </tbody>
                </table>

              </div>

            </div>
            
          </div>

          
          
        </section>

@endsection