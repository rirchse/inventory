
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
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
          <h2>Login</h2>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Login to start your session</p>

          <form action="<?php echo e(route('login.post')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback has-float-label">
              <label for="email">Email Address</label>
              <input type='email' name="email" class='form-control' required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback has-float-label">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-12">
                
                <br>
              </div>
              
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-submit">Login</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/inventory/resources/views/auth/login.blade.php ENDPATH**/ ?>