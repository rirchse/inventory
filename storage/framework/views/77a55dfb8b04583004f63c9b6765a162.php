<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php echo $__env->make('partials.styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('stylesheets'); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">	
		
		<div class="wrapper">

			<?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
			<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

				<?php echo $__env->yieldContent('content'); ?>

			</div>
      <!-- /.content-wrapper -->

			<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

		</div><!-- /wrapper -->	

	<!--   Core JS Files   -->
	<?php echo $__env->make('partials.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

	<?php echo $__env->yieldContent('scripts'); ?>

	<script type="text/javascript">
		$(document).ready(function() {
			// Javascript method's body can be found in assets/js/demos.js
			// demo.initDashboardPageCharts();
			// demo.initVectorMap();
		});
	</script>

	<script type="text/javascript">
    $(document).ready(function() {
        // md.initSliders()
        // demo.initFormExtendedDatetimepickers();
    });


    $('.datepicker').attr('placeholder', 'MM/DD/YYYY');
    $('.datepicker').datepicker({
    	format: 'mm/dd/yyyy',
	    autoclose: true
	  })
    </script>
</body>
</html><?php /**PATH /srv/www/inventory/resources/views/dashboard.blade.php ENDPATH**/ ?>