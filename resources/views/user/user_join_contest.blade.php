@extends('user.layouts.app')

@section('content')

<!-- contest list start -->
<section class="list-menu">


  <div class="contest-box border-text " style="margin:20px;background: #fff !important;">

  <div class="m-t-20 f-roboto grey f16 t-c strong">
     Join Contest
    </div>

  @if(session()->has('message'))
    <div class="alert {{session('class')}} m-t-20" style="margin-left: 60px;margin-right: 60px;">{{session('message')}}</div>
  @endif

    
<form action="{{route('create.join.contest',['id'=>$contest_id])}}" method="POST">
  @csrf   
    <div class="p-t-20 p-10 pointer">

      <div class="tf-pd-lr">
        <label class="m-0 f12 strong font-roboto c-green">Your PUBG Username<span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="user_nick" value="{{Auth::user()->nick}}" style="" placeholder="Enter your pubg username..." required>
        <span class="f12"></span>
      </div>

      <div class="t-c f-roboto f14 m-t-20 black tf-pd-lr" style="width: 100%;padding-left:60px;padding-right:60px;">You are agree to our <a href="{{route('terms.of.use')}}">Terms of Use</a> and <a href="{{route('contest',['id'=>$contest_id])}}">Rules</a> by clicking the join button.</div>

      <div class="m-t-20 t-c m-b-50" style="width: 100%;padding-left:80px;padding-right:80px;">
        <input type="submit" class="btn update-pro-btn" name="submit" value="Join Contest">
      </div>
      
    </div>
</form>


  </div>



</section>

@endsection