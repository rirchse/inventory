<?php $user = Auth::user(); ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo e(asset('/img/logo-sq.png')); ?>" width="50"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo e(asset('/img/logo-w.png')); ?>" class="img-responsive"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"></span>
            </a>
            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="">
                      <i class="fa fa-circle-o text-aqua"></i> 
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="/view_notifications">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/img/<?php echo e($user->image?'user/'. $user->image:'avatar.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo e($user->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo e(asset('/img/avatar.png')); ?>" class="img-circle" alt="User Image">
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/user/<?php echo e(Auth::id()); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/<?php echo e($user->image?'user/'. $user->image:'avatar.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="text-align:right">
          <p><?php echo e($user->name); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>
            
            <?php echo e(Auth::user()->authRole()->name); ?>


          </a><br>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <br>
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="">
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('sale.create')); ?>"><i class="fa fa-pencil"></i> POS</a></li>
            <li><a href="<?php echo e(route('sale.index')); ?>"><i class="fa fa-list"></i> View All Sales</a></li>
            <li><a href="/sale/All/Daily"><i class="fa fa-calendar"></i> View Daily Sales</a></li>
            <li><a href="/sale/New/view"><i class="fa fa-circle-o"></i> New  Sales</a></li>
            <li><a href="/sale/Confirmed/view"><i class="fa fa-circle-o"></i> Confirmed Sales</a></li>
            <li><a href="/sale/Completed/view"><i class="fa fa-circle-o"></i> Completed Sales</a></li>
            <li><a href="/sale/Cancelled/view"><i class="fa fa-circle-o"></i> Cancelled Sales</a></li>
            <li><a href="/return"><i class="fa fa-undo"></i> Returned Sales</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Payments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/payment"><i class="fa fa-circle-o"></i> View Payments</a></li>
            <li><a href="/payment/bKash/view"><i class="fa fa-circle-o"></i>bKash Payments</a></li>
            <li><a href="/payment/Rocket/view"><i class="fa fa-circle-o"></i> Rocket Payments</a></li>
            <li><a href="/payment/Nagad/view"><i class="fa fa-circle-o"></i>Nagad Payments</a></li>
            <li><a href="/payment/Cash/view"><i class="fa fa-circle-o"></i>Cash Payments</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('customer.index')); ?>"><i class="fa fa-circle-o"></i> View Customers</a></li>            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ul"></i> <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('purchase.index')); ?>"><i class="fa fa-list"></i> View Purchase List</a></li>
            <li><a href="#"><i class="fa fa-reply"></i> Purchase Returns</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Suppliers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('vendor.index')); ?>"><i class="fa fa-user"></i> View Suppliers</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('product.index')); ?>"><i class="fa fa-cube"></i> View Products</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-object-ungroup"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-object-group"></i> View Categories</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> View Brands</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> View Models</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list"></i> Sales Report</a></li>
            <li><a href="#"><i class="fa fa-cube"></i> Stock Report</a></li>
          </ul>
        </li>

        <?php if(Auth::user()->authorizeRoles(['SuperAdmin', 'Admin'])): ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('user.create')); ?>"><i class="fa fa-user-plus"></i> Create User</a></li>
            <li><a href="<?php echo e(route('user.index')); ?>"><i class="fa fa-users"></i> View Users</a></li>
          </ul>
        </li>

        <?php endif; ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('user.show', $user->id)); ?>"><i class="fa fa-user"></i> Update Profile</a></li>
            <li><a href="/change_password"><i class="fa fa-lock"></i> Change Password</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <div class="alert-section" style="">
    <div class="clearfix"></div>
    <?php echo $__env->make('partials.messages', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   
    <div class="clearfix"></div>
  </div><?php /**PATH /srv/www/inventory/resources/views/layouts/header.blade.php ENDPATH**/ ?>