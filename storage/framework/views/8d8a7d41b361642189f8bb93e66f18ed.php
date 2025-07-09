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
                  <th>Name</th>
                  <th>Category</th>                  
                  <th>Brand</th>
                  <th>MRP Price</th>
                  <th>Status</th>
                  <th>Buying Date</th>
                  <th width="110">Action</th>
                </tr>
                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->id); ?></td>
                  <td><?php echo e($product->title); ?></td>
                  <td><?php echo e($product->cat_id?App\Category::find($product->cat_id)->name:''); ?></td>
                  <td><?php echo e($product->brand); ?></td>
                  <td><?php echo e($product->mrp_price); ?></td>                  
                  <td>
                    <?php if($product->status == 1): ?>
                    <span class="label label-success">Active</span>
                    <?php elseif($product->status == 0): ?>
                    <span class="label label-warning">Inactive</span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo e(date('d M Y', strtotime($product->buying_date))); ?></td>
                  <td>
                    <a href="<?php echo e(route('product.show',$product->id)); ?>" class="label label-info" title="product Details"><i class="fa fa-file-text"></i></a>
                    <a href="<?php echo e(route('product.edit',$product->id)); ?>" class="label label-warning" title="Edit this product"><i class="fa fa-edit"></i></a>
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