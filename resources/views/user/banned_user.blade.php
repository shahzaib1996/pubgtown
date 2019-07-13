@extends('user.layouts.app')

@section('content')
<!-- contest list start -->
<section class="list-menu">
  <div class="contest-box border-text p-20" style="margin:20px;background: #fff !important;">
    <div class=" t-c f-roboto f13 grey">
                  <img src="{{asset('user/images/banned.jpg')}}" style="width: 200px;height: auto;"> <br>
                  <span class="f-roboto f16" style="color: red;">You Have Been Banned!</span>
                </div>
  </div>
</section>

@endsection

