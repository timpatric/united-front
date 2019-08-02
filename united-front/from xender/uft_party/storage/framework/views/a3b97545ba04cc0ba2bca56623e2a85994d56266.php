<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
    <?php echo Charts::assets(); ?>

<section class="content">
  <div class="box">
    <div class="box-header">

  <!-- /.box-header -->
   <div class="box-body">

      <br />
      <?php echo $chart->render(); ?>


    </div>
  </div>
  <!-- /.box-body -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('charts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nmj/Desktop/groupWork/3pm july 30/uft_party/resources/views/charts/index.blade.php ENDPATH**/ ?>