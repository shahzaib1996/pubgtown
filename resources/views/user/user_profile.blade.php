@extends('user.layouts.app')

@section('content')

<!-- contest list start -->
<section class="list-menu">

  <div class="morelinks bg-white">

    <div class="flex-sb-c p-10 pointer">
      <div class="t-c" style="width: 100%;background: ;">
        <img src="{{Auth::user()->avatar}}" class="circular w-101 h-101 m-t-30">
        <p class="black strong f14 font-roboto m-t-20" >Shahzaib Mehfooz</p>
        <p class="black strong f14 font-roboto ">Identification Number: </p>
        <p class="black f14 font-roboto ">shahzaibmehfooz420@gmail.com</p>
      </div>
      
    </div>

    <div class=" p-10 pointer">
      <div class="" style="width: 100%;padding-left:80px;padding-right:80px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Display Name <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="" value="" style="" placeholder="Enter here...">
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">PUBG username <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="" value="" style="" placeholder="Enter here...">
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Easy Paisa Mobile Account Number <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="" value="" style="" placeholder="Enter here...">
        <span class="f12">This will be used to send prize money</span>
      </div>

      <div class="m-t-20 t-c m-b-50" style="width: 100%;padding-left:80px;padding-right:80px;">
        <input type="button" class="btn update-pro-btn" name="update" value="Update">
      </div>
      
    </div>



  </div>



</section>

@endsection