@extends('user.layouts.app')

@section('content')

        <!-- contest list start -->
        <section class="list-contests">

          <div class="login-main-box">

            <div class="login-box">
              <div class="field-box">
                <label >Email</label>
                <input type="text" class="form-control" name="" placeholder="Enter your email...">
              </div>

              <div class="field-box">
                <label >Password</label>
                <input type="password" class="form-control" name="" placeholder="Enter your password...">
              </div>

              <div class="field-box">
                <input type="submit" class="btn btn-success" value="LOGIN" name="">
              </div>

              <div class="field-box">
                <label style="opacity: 0.5;"> <center>- OR -</center> </label>
              </div>

              <div class="field-box">
                <input type="button" class="btn btn-gmail" value="Login with Gmail" name="" >
              </div>

              <div class="field-box">
                <input type="button" class="btn btn-fb" value="Login with Facebook" name="" >
              </div>

            </div>         
          </div>                  
        </section>
@endsection