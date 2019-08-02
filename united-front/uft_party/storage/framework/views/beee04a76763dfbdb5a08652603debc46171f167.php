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
    <nav class="navbar" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar navbar-nav">
 
      <ul>
        <li>
          <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span style="font-weight: 800" class="fa fa-power">Logout</span>
          </a>
        </li>
      </ul>
   
      </div>
    </nav>
  </header>

   <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
      <?php echo e(csrf_field()); ?>

   </form>
<?php /**PATH /home/nmj/Desktop/united-front/uft_party/resources/views/layouts/header.blade.php ENDPATH**/ ?>