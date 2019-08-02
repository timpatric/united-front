<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
<section class="content">
      <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of districts</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="<?php echo e(route('district-management.create')); ?>">Add new district </a>
        </div>
      </div>
    </div>
  <!-- /.box-header -->
   <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
          <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="<?php echo e(route('district-management.index')); ?>">
        <div class="form-group">
          <input type="search" name="search" class="form-control" required>
        </div>
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search
          </button>
        </span>
      </form>
    </div>
      <br />
         <table class="table table-bordered table-stripped">
            <tr>
                
            </tr>
                <tr>
                </tr>
         </table>

      <table class="table table-bordered table-stripped">
          <tr>
              <th>District Code</th>
              <th>District Name</th>
              <th>Members available</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
          <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($district->district_code); ?></td>
                  <td><?php echo e($district->district_name); ?></td>
                  <td>Empty</td>
                  <td><a href = 'edit/<?php echo e($district->district_id); ?>'>Edit</a></td>
                  <td><a href = 'destroy/<?php echo e($district->district_id); ?>'>Delete</a></td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
  </div>
  <!-- /.box-body -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('district_mgt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nmj/Desktop/groupWork/3pm july 30/uft_party/resources/views/district_mgt/index.blade.php ENDPATH**/ ?>