@extends('user.layouts.app')

@section('content')

<!-- contest list start -->
<section class="list-menu">

  <div class="contest-box border-text p-20" style="margin:20px;background: #fff !important;">

    

    <div class=" t-c f-roboto f13 grey">
                  <img src="{{asset('user/images/n-f.png')}}" style="width: 60px;height: auto;"> <br>
                  Please Login to continue !
                </div>

                <div class="t-c m-b-20 m-t-10" style="width: 100%;">
                      <input type="button" class="btn update-pro-btn click-login-btn" name="request" value="click here to Login">
                    </div>


  </div>



</section>

@endsection

@push('scripts')
<script>
  $('.click-login-btn').click(function(){
    $('.login').click();
  })
</script>
@endpush 