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
                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#request" role="tab" aria-controls="request" aria-selected="true">Deposit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="prize-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Deposit History</a>
              </li>
              
            </ul>
            <div class="tab-content p-10 border-left border-right border-bottom bg-white-i m-b-20" id="myTabContent">

              <div class="tab-pane fade show active m-t-10 " id="request" role="tabpanel" aria-labelledby="request-tab">

                <div class="morelinks bg-white">


                <div class="m-t-20 f-roboto f14 grey" style="width: 100%;padding-left:70px;padding-right:70px;"> 

                  <div class="t-c f-roboto f16 strong m-b-10" >Deposit Method</div>
                  1. Send Money to given Easy Paisa Account Number(s). <br>
                  2. Fill and Submit payment details in the form below. <br>
                  <div class="f16 t-c m-t-10"> Easy Paisa A/C # <span class="strong"> {{$easypaisa_account}} </span> </div>

                </div>

                  
                <form action="{{ route('deposit.create') }}" method="POST">
                  @csrf
                  <div class=" p-10 pointer">

                    <div class="" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Amount <span style="color:red;">*</span> </label>
                      <input type="number" class="profile-tb font-roboto " name="amount" value="" style="" placeholder="Enter here...">
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Transaction ID <span style="color:red;">*</span> </label>
                      <input type="text" class="profile-tb font-roboto " name="transaction_id" value="" style="" placeholder="Enter here...">
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Message <span style="color:red;">*</span> </label>
                      <input type="text" class="profile-tb font-roboto " name="message" style="" placeholder="Enter Here...">
                      <span class="f12">Account Title/Mobile Number</span>
                    </div>

                    <div class="m-t-20 t-c m-b-50" style="width: 100%;padding-left:80px;padding-right:80px;">
                      <input type="submit" class="btn update-pro-btn" name="request" value="Submit">
                    </div>
                    
                  </div>
                </form>


  </div>


              </div>

              <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">

                @if( count($deposit_history) != 0 )

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

                    @foreach($deposit_history as $history)
                    @php
                    $count++;
                    @endphp
                    <tr>
                      <td> {{$count}} </td>
                      <td>Rs. {{$history->amount}} </td>
                      <td> {{Carbon\Carbon::parse($history->created_at)->isoformat('DD-MMM-YYYY')}} </td>
                      <td>
                        @if( $history->approve_status == 0 )
                        <span class="badge badge-pill badge-warning">Pending</span> <br>
                        <span class="trx">Trx ID {{$history->transaction_id}} </span>
                        @elseif( $history->approve_status == 1 )
                        <span class="badge badge-pill badge-success">Credited</span> <br>
                        <span class="trx">Trx ID {{$history->transaction_id}} </span>
                        @elseif( $history->approve_status == 2 )
                        <span class="badge badge-pill badge-danger">Rejected</span> <br>
                        <span class="trx">Trx ID {{$history->transaction_id}} </span>
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