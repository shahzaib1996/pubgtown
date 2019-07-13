@extends('user.layouts.app')

@section('content')
        <!-- contest list start -->
        <section class="list-contests">

        @if(session()->has('message'))
          <div class="alert {{session('class')}} m-t-20 t-c">{{session('message')}}</div>
        @endif
     
          <div class="tabs-box">

            <ul class="nav nav-tabs f-roboto f14" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#request" role="tab" aria-controls="request" aria-selected="true">Withdraw Request</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="prize-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Withdraw History</a>
              </li>
              
            </ul>
            <div class="tab-content p-10 border-left border-right border-bottom bg-white-i m-b-20" id="myTabContent">

              <div class="tab-pane fade show active m-t-10 " id="request" role="tabpanel" aria-labelledby="request-tab">

                <div class="morelinks bg-white">

                  
                <form action="{{ route('withdraw.create') }}" method="POST">
                  @csrf
                  <div class=" p-10 pointer">

                    <div class="" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Amount <span style="color:red;">*</span> </label>
                      <input type="number" class="profile-tb font-roboto " name="amount" value="" style="" placeholder="Enter here..." required>
                      <span class="f12">Minimum withdaw amount is Rs. 200</span>
                    </div>

                    <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Easy Paisa Mobile Account Number <span style="color:red;">*</span> </label>
                      <input type="text" maxlength="11" class="profile-tb font-roboto " name="mobile" value="{{Auth::user()->mobile}}" style="" placeholder="eg. 03471234567" required>
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20 t-c m-b-50" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <input type="submit" class="btn update-pro-btn" name="request" value="Request">
                    </div>
                    
                  </div>
                </form>

  </div>

           </div>

              <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">

                @if( count($withdraw_history) != 0 )

                <table class="table f13 f-roboto">
                  
                  <tbody>
                    <tr class="bg-lightgrey white no-border">
                      <td class="no-border">S.No</td>
                      <td class="no-border">Amount</td>
                      <td class="no-border">Date</td>
                      <td class="no-border">Status</td>
                    </tr>

                    @php
                    $count = 0;
                    @endphp

                    @foreach($withdraw_history as $history)
                    @php
                    $count++;
                    @endphp
                    <tr>
                      <td> {{$count}} </td>
                      <td>Rs. {{$history->amount}} </td>
                      <td> {{Carbon\Carbon::parse($history->created_at)->isoformat('DD-MMM-YYYY')}} </td>
                      <td>
                        @if( $history->status == 0 )
                        <span class="badge badge-pill badge-danger">Pending</span>
                        @elseif( $history->status == 1 )
                        <span class="badge badge-pill badge-success">Completed</span> <br>
                        <span class="trx"> {{$history->transaction_id}} </span>
                        @elseif( $history->status == 2 )
                        <span class="badge badge-pill badge-info">Refunded</span> <br>
                        <span class="trx"> {{$history->transaction_id}} </span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                @else 
                  
                <div class="m-t-20 t-c f-roboto f13 grey">
                  <img src="{{asset('user/images/n-f.png')}}" style="width: 50px;height: auto;"> <br>
                  No Records Found.
                </div>

                @endif

              </div>

            </div>
            
          </div>     
          
        </section>
@endsection