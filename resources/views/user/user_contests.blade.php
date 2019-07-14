@extends('user.layouts.app')

@section('content')
        <!-- contest list start -->
        <section class="list-contests">

        @if( count($user_contests) != 0)
          
          <div class="f-roboto f16 t-c strong m-t-20">
            My Contests
          </div>
          
          @foreach($user_contests as $uc)

         <!-- Contest Box Start -->
         <a href="{{route('contest',['id'=>$uc->contest])}}" class="context-box-anchor">
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
                  <div class="black f14 strong op-8">Rs {{$uc->contest->prize_pool}}</div>
                </div>
                <div class="t-c">
                  <div class="lightgrey f13">Per Kill</div>
                  <div class="black f14 strong op-8">Rs {{$uc->contest->per_kill}}</div>
                </div>
                <div class="t-r">
                  <div class="lightgrey f13">Entry</div>
                  <div class="black f14 strong op-8">Rs {{$uc->contest->entry_fee}}</div>
                </div>
              </div>

              <div class="cdc2 flex-sb-c relative f13 m-t-10">
                <span class="strong blue capitalize">{{$uc->contest->map}}</span>
                <span class="strong dark-orange">{{Carbon\Carbon::parse($uc->contest->contest_date)->isoformat('MMM D, dddd')}}</span>
                <span class="strong dark-orange">{{Carbon\Carbon::parse($uc->contest->contest_time)->isoformat('h:mm a')}}</span>
                <span class="strong blue capitalize ">{{$uc->contest->type}}</span>
              </div>

              <div class="cdc3 relative f12 m-t-10">
                <div class="progress h-5-i">
                  <div class="progress-bar bg-warning bg-dark-orange" role="progressbar" style="width: {{count($uc->contest->contest_player)}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="f13 flex-sb-c m-t-5">
                  <span>{{ count($uc->contest->contest_player) }}/{{$uc->contest->no_of_teams}} Teams</span> 
                  @if($uc->contest->is_active == 1)
                  <button class="btn btn-sm btn-success f13 fw" disabled>Joined</button> 
                  @elseif($uc->contest->is_active == 0)
                  <button class="btn btn-sm btn-success f13" disabled>Closed</button> 
                  @elseif($uc->contest->is_active == 2)
                  <button class="btn btn-sm btn-danger f13">LIVE</button>
                  @endif                
                </div>
                
              </div>

            </div>

          </div><!-- Contest Box End -->
          </a>
          <!-- uc->contest->is_active != 1 -->
          @if(1)
          <div class="t-c p-t-10 uc-details flex-sb-c p-l-10p p-r-10p">
            <span class="badge badge-info">Rank {{$uc->rank}}</span>
            <span class="badge badge-danger">Kill(s) {{$uc->kills}}</span>
            <span class="badge badge-success">Prize Won {{$uc->pay_total_prize}} Rs</span>
          </div>
          @endif


          @endforeach

          <div style="height: 20px;width: 100%;"></div>

          @else
            
            <div class="m-t-20 m-b-50 t-c f-roboto f13 grey">
                  <img src="{{asset('user/images/n-f.png')}}" style="width: 50px;height: auto;"> <br>
                  You haven't Join any contest yet.<br><br>
                  <a href="{{route('user')}}" class="joinnow-btn f14">Join Now</a>
                </div>

        @endif        
        </section>

@endsection