<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

  <!-- FA FONT Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">  

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- <link rel="stylesheet" href="css/main.css"> -->
  <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


  @stack('css')

  <title>PUBGTown - Kill & Earn</title>
</head>
<body>

  <div id="main-wrapper">

    <section id="section1">   

      <div class="header">

        <div class="head-sec-1">
          <a href="@if(url()->current() != route('show.menu')) {{route('show.menu')}} @else {{route('user')}} @endif">
            <i class="fas fa-bars"></i>
          </a>
          <a href="#" class="mlogo">
            <img src="{{ asset('user/images/new-main-logo.png') }}" class="img-fluid" width="130px">

            <!-- <div class="slogan">EAT, SLEEP AND CHICKEN DINNER!</div> -->
          </a>

          @auth

          <!-- After Login Btn -->
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{Auth::user()->avatar}}" class="circular w-30 h-30"> 
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0 b-r-0" aria-labelledby="dropdownMenuLink" >
              <a class="dropdown-item dd-a-c" style="background: #cc7d02;color:#fff !important;">Credit Rs.{{Auth::user()->balance}}</a>
              <a class="dropdown-item dd-a-c" href="{{route('deposit')}}">Deposit</a>
              <a class="dropdown-item dd-a-c" href="{{route('withdraw')}}">Withdraw</a>
              <a class="dropdown-item dd-a-c" href="{{route('show.profile')}}">Profile</a>
              <!-- <a class="dropdown-item dd-a-c" href="">Logout</a> -->
              <a class="dropdown-item dd-a-c" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>

          @else

            <!-- Before Login  -->
          <a href="" class="login" data-toggle="modal" data-target="#exampleModal">
            LOG IN
          </a>

          @endauth
          

          <!-- After Login Btn -->
          <!-- <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="images/instagram.png" class="circular w-30 h-30">
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0 b-r-0" aria-labelledby="dropdownMenuLink" >
              <a class="dropdown-item dd-a-c" href="#">Profile</a>
              <a class="dropdown-item dd-a-c" href="">Logout</a>
            </div>
          </div> -->


        </div>

        <div class="head-sec-2">
          <div class="container">

            <div class="row">

              <div class="col hs21 t-c">
                <a href="{{route('user')}}" class="@if(url()->current() == route('user')) active @endif">
                  <i class="fas fa-trophy"></i> Contests
                </a>
              </div>

              <div class="col hs22 t-c" >
                <a href="{{route('user.contests')}}" class="@if(url()->current() == route('user.contests')) active @endif">
                  <i class="fas fa-star"></i> My Contests
                </a>
              </div>

              <div class="col hs23 t-c">
                <a href="{{route('user.videos')}}" class="@if(url()->current() == route('user.videos')) active @endif">
                  <i class="fab fa-youtube"></i> Videos
                </a>
              </div>

            </div>

          </div>

        </div>

      </div> <!-- Header end -->


      <div id="main-body" class="">
        
        <!-- contest list start -->
        @yield('content')

        <!-- Start Google Code -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3243708017049225",
            enable_page_level_ads: true
          });
        </script>
        <!-- End Google Code -->

        <section class="foot-box">
          <div class="bottom">

            <div class="copyright-box white f14 flex-c-c t-c">
              Follow us on
            </div>

            <div class="flex-c-c m-t-10">
              <a href="">
                <img src="{{ asset('user/images/instagram.png') }}" class="w-30">
              </a>
              <a href="https://www.facebook.com/NewPUBGTown" target="_blank">
                <img src="{{ asset('user/images/facebook.png') }}" class="w-30 m-l-20">
              </a>
              <a href="https://www.youtube.com/channel/UCEJx0oLaqqr0FoPvjNVSVaA">
                <img src="{{ asset('user/images/youtube.png') }}" class="w-30 m-l-20">
              </a>
            </div>

            <div class="links-box flex-sb-c white-i">
              <div class="f12">
                <a href="{{route('about.us')}}" class="blink block white-i t-decor">About Us</a>
                <a href="" class="blink block m-t-5 white-i t-decor"></a>
              </div>
              <div class="f12">
                <a href="{{ route('privacy.policy') }}" class="blink block white-i t-decor">Privacy Policy</a>
                <a href="{{ route('terms.of.use') }}" class="blink block m-t-5 white-i t-decor">Terms of Use</a>
              </div>
              <div class="f12">
                <a href="{{route('user.contact')}}" class="blink block white-i t-decor">Contact Us</a>
                <a href="" class="blink block m-t-5 white-i t-decor"></a>
              </div>
            </div>

            <div class="copyright-box white f13 flex-c-c t-c">
              Copyright &copy; 2019 All rights reserved.
            </div>

            
          </div>
        </section>
        
      </div>



      <div class="footer flex-c-c t-c">
        For any query, write to us at info@newpubgtown.com
      </div>

    </section>

    <section id="section2" class="rhs flex-c-c border-left">

      <div class="logo-slogan-box">
        <!-- <img src="{{ asset('user/images/new-big-logo.png') }}" class="img-fluid main-logo" width="400px"> -->
        <!-- <div class="slogan">EAT, SLEEP AND CHICKEN DINNER!</div> -->
      </div>

    </section>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle">LOG IN </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="field-box">
            <a href="{{ url('/redirect') }}" class="btn btn-gmail"> <i class="fab fa-google-plus-g"></i> Login with Gmail </a>
            <!-- <input type="button" class="btn btn-gmail" value="Login with Gmail" name="" > -->
          </div>

          <div class="field-box">
            <a href="{{ url('facebook') }}" class="btn btn-fb m-t-20"> <i class="fab fa-facebook"></i> Login with Facebook </a>
            <!-- <input type="button" class="btn btn-fb" value="Login with Facebook" name="" > -->
          </div>


          <div class="t-c f14 m-t-10" style="color:#5f7762;">
            We dare you to come <span class="red">Pochinki</span> !
          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

  <!-- <script src="{{ asset('user/js/jquery-3.3.1.slim.min.js') }}"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="{{ asset('user/js/popper.min.js') }}"></script>

  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


  @stack('scripts')

</body>
</html>