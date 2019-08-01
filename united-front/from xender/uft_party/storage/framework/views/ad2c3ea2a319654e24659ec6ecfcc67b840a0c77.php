  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">UFT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $__env->make('layouts.project_name', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo e(asset("/bower_components/dist/img/uftl.jpg")); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo e(Auth::user()->username); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <!-- Menu Footer-->
              <li class="user-footer">
               <?php if(Auth::guest()): ?>
                  <div class="pull-left">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-default btn-flat">Login</a>
                  </div>
               <?php else: ?>
                 <div class="pull-right">
                    <a style="border-radius:3px;background-color:#337ab7;;border-color:#2e6da4;color:white" class="btn btn-default btn-flat" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                    </a>
                 </div>
                <?php endif; ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
      <?php echo e(csrf_field()); ?>

   </form>
<?php /**PATH /home/nmj/Desktop/groupWork/uft_party (copy)/resources/views/layouts/header.blade.php ENDPATH**/ ?>