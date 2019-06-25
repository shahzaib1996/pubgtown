<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

  <!-- FA FONT Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="css/main.css"> -->
  <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">

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
          </a>

          @auth

          <!-- After Login Btn -->
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{Auth::user()->avatar}}" class="circular w-30 h-30"> 
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0 b-r-0" aria-labelledby="dropdownMenuLink" >
              <a class="dropdown-item dd-a-c" style="background: #cc7d02;color:#fff !important;">Credit Rs.{{Auth::user()->balance}}</a>
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
                <a href="{{route('user')}}" class="active">
                  <i class="fas fa-trophy"></i> Contests
                </a>
              </div>

              <div class="col hs22 t-c">
                <a href="">
                  <i class="fas fa-star"></i> My Contests
                </a>
              </div>

              <div class="col hs23 t-c">
                <a href="">
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

        <section class="foot-box">
          <div class="bottom">

            <div class="copyright-box white f14 flex-c-c t-c">
              Follow us on
            </div>

            <div class="flex-c-c m-t-10">
              <a href="">
                <img src="{{ asset('user/images/instagram.png') }}" class="w-30">
              </a>
              <a href="">
                <img src="{{ asset('user/images/facebook.png') }}" class="w-30 m-l-20">
              </a>
              <a href="">
                <img src="{{ asset('user/images/youtube.png') }}" class="w-30 m-l-20">
              </a>
            </div>

            <div class="links-box flex-sb-c white-i">
              <div class="f12">
                <a href="" class="blink block white-i t-decor">About Us</a>
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
        For any query, write to us at info@pubgtown.com
      </div>

    </section>

    <section id="section2" class="rhs flex-c-c border-left">

      <div class="logo-slogan-box">
        <!-- <img src="{{ asset('user/images/big-logo-s.png') }}" class="img-fluid main-logo" width="400px"> -->
        <!-- <div class="slogan">Kill First, Die Last, No Luck, All Skill</div> -->
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

          <!-- <div class="field-box">
            <input type="button" class="btn btn-fb" value="Login with Facebook" name="" >
          </div> -->

          <div class="t-c f14 m-t-10" style="color:#5f7762;">
            We dare you to come <span class="red">Pochinki</span> !
          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  @stack('scripts')

</body>
</html>