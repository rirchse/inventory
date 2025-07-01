<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php echo $__env->make('partials.styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('stylesheets'); ?>

</head>

<body class="login-page">
    <?php echo $__env->make('auth.login_header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('auth.login_footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

	<!--   Core JS Files   -->
	<?php echo $__env->make('partials.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

	<?php echo $__env->yieldContent('scripts'); ?>

	<script type="text/javascript">
    $().ready(function() {
    	demo.checkFullPageBackgroundImage();
    	setTimeout(function() {
    		// after 1000 ms we add the class animated to the login/register card
    		$('.card').removeClass('card-hidden');
    	}, 700)
    });
  </script>

</body>
</html><?php /**PATH /srv/www/inventory/resources/views/login.blade.php ENDPATH**/ ?>