@extends('login')
@section('title', 'Login')
@section('content')
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<style>
    .checkbox{padding-left: 25px}
</style>

<div class="main-wrapper" stlye="width:100%;">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="sign-up-form">
        <div class="login-box" style="margin-top:100px">
        <div class="login-logo">
          <h2>API Login</h2>
        </div>
        <div class="login-box-body">
          <p class="login-box-msg">Login to start your session</p>

          <form id="loginForm" action="#">
            @csrf
            <div class="form-group has-feedback has-float-label">
              <label for="email">Email Address</label>
              <input type='email' name="email" class='form-control' required value="rirchse@gmail.com">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback has-float-label">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required value="rockyrocky">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-submit" >Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <a href="#" class="text-primary">I forgot my password</a>
        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('scripts')

<script>
  document.getElementById('loginForm').addEventListener('submit', function(e){
    e.preventDefault();

    const formData = new FormData(e.target);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: "/api/login",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(res) {
        localStorage.setItem("access_token", res.access_token);
        console.log("Token:", res.access_token);
      },
      error: function(err) {
        console.error("Login failed", err.responseText);
      }
    });

  });
</script>
@endsection