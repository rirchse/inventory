<?php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
?>


<?php $__env->startSection('title', 'View All Purchase'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>All Purchase</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    
    <li class="active">All Purchase</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Purchase</h3>
              <div class="box-tools">
                <a href="<?php echo e(route('purchase.create')); ?>" class="btn btn-sm btn-info">
                  <i class="fa fa-plus"></i> Add
                </a>
                <div class="input-group input-group-sm" style="float:right; width: 150px;margin-left:15px">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <tr>
                  <th>Id</th>
                  <th>Voucher No.</th>
                  <th>Total</th>                  
                  <th>Grand Total</th>
                  <th>Paid</th>
                  <th>Due</th>
                  
                  <th>Date</th>
                  <th width="110">Action</th>
                </tr>
                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($value->id); ?></td>
                  <td><?php echo e($value->voucher_no); ?></td>
                  <td><?php echo e(number_format($value->total)); ?></td>
                  <td><?php echo e($value->grand_total); ?></td>
                  <td><?php echo e($value->paid); ?></td>
                  <td><?php echo e($value->due); ?></td>
                  
                  <td><?php echo e($source->dformat($value->buying_date)); ?></td>
                  <td>
                    <a href="<?php echo e(route('purchase.show', $value->id)); ?>" class="btn btn-info" title="purchase Details"><i class="fa fa-file-text"></i></a>
                    <a href="<?php echo e(route('purchase.edit', $value->id)); ?>" class="btn btn-warning" title="Edit this purchase"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /srv/www/inventory/resources/views/layouts/purchases/index.blade.php ENDPATH**/ ?>