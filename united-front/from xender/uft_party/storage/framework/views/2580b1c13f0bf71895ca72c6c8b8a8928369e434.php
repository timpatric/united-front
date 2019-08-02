<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Salaries distributions per month</h3>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="<?php echo e(route('salary-management.index')); ?>">
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
                <th>Role</th>
                <th>Amount Each</th>
                <th>Number </th>
                <th>Total amount</th>
            </tr>
           <?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($salary->role); ?></td>
                  <td><?php echo e($salary->amount); ?></td>
                  <td><?php echo e($salary->Number); ?></td>
                  <td><?php echo e($salary->total); ?></td>
                </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('salary_mgt.payments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('salary_mgt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uft_party\resources\views/salary_mgt/index.blade.php ENDPATH**/ ?>