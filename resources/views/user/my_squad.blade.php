@extends('user.layouts.app')

@section('content')
<!-- contest list start -->

<!-- contest list start -->
        <section class="list-contests">

        @if(session()->has('message'))
          <div class="alert {{session('class')}} m-t-20 t-c">{{session('message')}}</div>
        @endif

         
          <div class="tabs-box">

            <ul class="nav nav-tabs f-roboto f14" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#request" role="tab" aria-controls="request" aria-selected="true">My Squads</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="prize-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false">Create Squad</a>
              </li>
              
            </ul>
            <div class="tab-content p-10 border-left border-right border-bottom bg-white-i m-b-20" id="myTabContent">

              <div class="tab-pane fade show active m-t-10 " id="request" role="tabpanel" aria-labelledby="request-tab">

                <div class="morelinks bg-white">

                  Show Squads


                </div>

              </div>

              <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">

                
                  <div class="m-t-20 f-roboto grey f16 t-c strong">
                   My Squad
                  </div>

                @if(session()->has('message'))
                  <div class="alert {{session('class')}} m-t-20" style="margin-left: 60px;margin-right: 60px;">{{session('message')}}</div>
                @endif

              <form action="{{route('user.contact.create')}}" method="POST">
                @csrf   
                  <div class="p-t-20 p-10 pointer">
                    
                    <div class="" style="width: 100%;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Squad Name <span style="color:red;">*</span> </label>
                      <input type="text" class="profile-tb font-roboto " name="squad_name" value="" style="" placeholder="" required>
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20" style="width: 100%;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Member 1 Identification Number (Captain)<span style="color:red;">*</span> </label>
                      <select class="profile-tb font-roboto " name="player_1" id="player1" style="width: 100%;" required>
                        <option value="{{Auth::user()->id}}"> {{Auth::user()->id}} - {{Auth::user()->name}} </option>
                        <option value="0">DEF</option>
                        <option value="0">GHI</option>
                      </select>
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20" style="width: 100%;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Member 2 Identification Number<span style="color:red;">*</span> </label>
                      <select class="profile-tb font-roboto " name="player_2" id="player2" style="width: 100%;" required>
                        <!-- <option value="">Select Player</option>
                        <option value="0">DEF</option>
                        <option value="0">GHI</option> -->
                      </select>
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20" style="width: 100%;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Member 3 Identification Number<span style="color:red;">*</span> </label>
                      <select class="profile-tb font-roboto " name="player_3" id="player3" style="width: 100%;" required>
                        <!-- <option value="">Select Player</option>
                        <option value="0">DEF</option>
                        <option value="0">GHI</option> -->
                      </select>
                      <span class="f12"></span>
                    </div>

                    <div class="m-t-20" style="width: 100%;">
                      <label class="m-0 f12 strong font-roboto" style="color:#466149;">Member 4 Identification Number<span style="color:red;">*</span> </label>
                      <select class="profile-tb font-roboto " name="player_3" id="player4" style="width: 100%;" required>
                        <!-- <option value="">Select Player</option>
                        <option value="0">DEF</option>
                        <option value="0">GHI</option> -->
                      </select>
                      <span class="f12"></span>
                    </div>

                    

                    <div class="m-t-20 t-c m-b-50" style="width: 100%;">
                      <input type="submit" class="btn update-pro-btn" name="submit" value="Create">
                    </div>
                    
                  </div>
              </form>


              </div>              

            </div>
            
          </div>

        </section>

@endsection

@push('scripts')
<script>
$(function () {

       // $('#player1').select2();
      // $('#player1').select2({
      //   ajax: {
      //     url: "{{route('user.select.players')}}",
      //     dataType: 'json'
      //       // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      //   }
      // });

    // $( "#player1" ).select2({        
    //     ajax: {
    //         url: "{{route('user.select.players')}}",
    //         dataType: 'json',
    //         delay: 250,
    //         data: function (params) {
    //             return {
    //                 q: params.term // search term
    //             };
    //         },
    //         processResults: function (data) {
    //             // parse the results into the format expected by Select2.
    //             // since we are using custom formatting functions we do not need to
    //             // alter the remote JSON data
    //             return {
    //                 results: data
    //             };
    //         },
    //         cache: true
    //     },
        
    // });

    $( "#player2" ).select2({        
        ajax: {
            url: "{{route('user.select.players')}}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function (data) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

    $( "#player3" ).select2({        
        ajax: {
            url: "{{route('user.select.players')}}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function (data) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

    $( "#player4" ).select2({        
        ajax: {
            url: "{{route('user.select.players')}}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function (data) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

})
</script>
@endpush