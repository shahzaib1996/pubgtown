@extends('user.layouts.app')

@section('content')
<!-- contest list start -->
<section class="list-menu">
  <div class="morelinks bg-white">

    <a href="{{route('show.profile')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">Profile</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">My Squad</span> <sup class="badge badge-danger">comming soon</sup>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="{{route('deposit')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">Deposit</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="{{route('withdraw')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">Withdraw</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">My Stats</span> <sup class="badge badge-danger">comming soon</sup>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <div class="h-5 bg-black"> </div>

    <a href="{{route('about.us')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">About Us</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="{{route('user.contact')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">Contact Us</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="{{route('terms.of.use')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">Terms of Use</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

    <a href="{{route('privacy.policy')}}" class="flex-sb-c p-10 pointer">
      <div>
        <img src="{{ asset('user/images/aim.png') }}" class="w-30" alt="Aim Icon">
        <span class="m-l-10 ">Privacy Policy</span>
      </div>
      <div class="f14">
        <i class="fa fa-angle-right"></i>
      </div>
    </a>

  </div>

</section>
@endsection