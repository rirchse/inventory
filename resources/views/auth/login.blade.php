@extends('login')
@section('title', 'Login')
@section('content')
<style>
    .checkbox{padding-left: 25px}
    .invalid-feedback{
    color:red;
  }
</style>

@include('partials.messages')
<div class="main-wrapper" stlye="width:100%;">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="sign-up-form">
        <div class="login-box" style="margin-top:100px">
        <div class="login-logo">
          <h2>Login</h2>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Login to start your session</p>

          <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group has-feedback has-float-label">
              <label for="email">Email Address</label>
              <input type='email' name="email" class='form-control' @error('email') is-invalid @enderror value="{{ old('email') }}" autocomplete="email" autofocus>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group has-feedback has-float-label">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control"  @error('password') is-invalid @enderror value="{{ old('password') }}" autocomplete="password" autofocus>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="row">
              <div class="col-xs-12">
                {{-- @include('/partials.google_recaptcha') --}}
                <br>
              </div>
              {{-- <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label class="">
                    <input type="checkbox" class="checkbox"> Remember Me
                  </label>
                  <div class="clearfix"></div>
                </div>
              </div> --}}
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-submit">Login</button>
                
                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Login using
              Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Login using
              Google+</a>
          </div> -->
          <!-- /.social-auth-links -->

          <a href="#" class="text-primary">I forgot my password</a>
        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->
      </div>
      
    </div>
  </div>
</div>
@endsection