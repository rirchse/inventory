<?php
use \App\Http\Controllers\SourceCtrl;
$source = new SourceCtrl;
?>


<?php $__env->startSection('title', 'View All Product'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>All Product</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    
    <li class="active">All Product</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Product</h3>
              <div class="box-tools">
                <a href="<?php echo e(route('product.create')); ?>" class="btn btn-sm btn-info">
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
                  <th>Name</th>
                  <th>SKU</th>                  
                  <th>Barcode</th>
                  <th>Units</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th width="110">Action</th>
                </tr>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->id); ?></td>
                  <td><?php echo e($product->name); ?></td>
                  <td><?php echo e($product->sku); ?></td>
                  <td><?php echo e($product->barcode); ?></td>
                  <td>
                    <?php $__currentLoopData = $product->productUnit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($unit->unit_name); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td>
                    <?php $__currentLoopData = $product->productUnit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($unit->price); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td>
                    <?php $__currentLoopData = $product->stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($stock->quantity); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td>
                    <?php if($product->status == 1): ?>
                    <span class="label label-success">Active</span>
                    <?php elseif($product->status == 0): ?>
                    <span class="label label-warning">Inactive</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?php echo e(route('product.show',$product->id)); ?>" class="btn btn-info" title="product Details"><i class="fa fa-file-text"></i></a>
                    <a href="<?php echo e(route('product.edit',$product->id)); ?>" class="btn btn-warning" title="Edit this product"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination-sm no-margin pull-right">
                <?php echo e($products->links()); ?>

              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /srv/www/inventory/resources/views/layouts/products/index.blade.php ENDPATH**/ ?>