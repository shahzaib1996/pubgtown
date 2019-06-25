@extends('user.layouts.app')

@section('content')

<!-- contest list start -->
<section class="list-menu">


  <div class="contest-box border-text " style="margin:20px;background: #fff !important;">

  <div class="m-t-20 f-roboto grey f16 t-c strong">
     Contact Us
    </div>

  @if(session()->has('message'))
    <div class="alert {{session('class')}} m-t-20" style="margin-left: 60px;margin-right: 60px;">{{session('message')}}</div>
  @endif

    
<form action="{{route('user.contact.create')}}" method="POST">
  @csrf   
    <div class="p-t-20 p-10 pointer">

      <div class="" style="width: 100%;padding-left:60px;padding-right:60px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Name <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="name" value="" style="" placeholder="" required>
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:60px;padding-right:60px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Email <span style="color:red;">*</span> </label>
        <input type="email" class="profile-tb font-roboto " name="email" value="" style="" placeholder="" required>
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:60px;padding-right:60px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Mobile <span style="color:red;">*</span> </label>
        <input type="text" class="profile-tb font-roboto " name="mobile" value="" style="" placeholder="" required>
        <span class="f12"></span>
      </div>

      <div class="m-t-20" style="width: 100%;padding-left:60px;padding-right:60px;">
        <label class="m-0 f12 strong font-roboto" style="color:#466149;">Message <span style="color:red;">*</span> </label>
        <textarea type="text" class="profile-tb font-roboto " name="message" value="" style="" rows="3" required></textarea>
        <span class="f12"></span>
      </div>

      

      <div class="m-t-20 t-c m-b-50" style="width: 100%;padding-left:80px;padding-right:80px;">
        <input type="submit" class="btn update-pro-btn" name="submit" value="Submit">
      </div>
      
    </div>
</form>


  </div>



</section>

@endsection