@extends('user.layouts.app')

@section('content')

<!-- contest list start -->
<section class="list-menu">

  <div class="morelinks bg-white">

    <div class="flex-sb-c p-10 pointer">
      <div class="t-c" style="width: 100%;background: ;">
        <img src="{{Auth::user()->avatar}}" class="circular w-101 h-101 m-t-30">
        <p class="black strong f14 font-roboto m-t-20" >{{Auth::user()->name}}</p>
        <!-- <p class="black strong f14 font-roboto ">Identification Number: </p> -->
        <p class="black f14 font-roboto ">{{Auth::user()->email}}</p>
      </div>
      
    </div>

    <div class=" p-10 pointer">

      @if(session()->has('message'))
        <div class="" style="width: 100%;padding-left:80px;padding-right:80px;">
          <div class="alert {{session('class')}} m-t-20 t-c">{{session('message')}}</div>
        </div>
      @endif

      <form action="{{route('user.profile.update')}}" method="POST">
        @csrf
      <div class="" style="width: 100%;padding-left:80px;padding-right:80px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Display Name <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="name" value="{{Auth::user()->name}}" style="" placeholder="Enter here..." required>
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">PUBG username <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="nick" value="{{Auth::user()->nick}}" style="" placeholder="Enter here..." required>
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:80px;padding-right:80px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Easy Paisa Mobile Account Number <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="mobile" value="{{Auth::user()->mobile}}" style="" placeholder="Enter here..." required>
        <span class="f12">This will be used to send money</span>
      </div>

      <div class="m-t-20 t-c m-b-50" style="width: 100%;padding-left:80px;padding-right:80px;">
        <input type="submit" class="btn update-pro-btn" name="update" value="Update">
      </div>
      </form>
    </div>



  </div>



</section>

@endsection