<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Salaries
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Salaries distribution</a></li>
        <li class="active">Salaries</li>
      </ol>
    </section>
    <?php echo $__env->yieldContent('action-content'); ?>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nmj/Desktop/united-front/uft_party/resources/views/salary_mgt/base.blade.php ENDPATH**/ ?>