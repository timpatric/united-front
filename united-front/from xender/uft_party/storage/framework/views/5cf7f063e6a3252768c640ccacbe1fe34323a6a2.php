<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
<section class="content">
<?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title">List of party agents</h3>
        </div>
      </div>
    </div>
  <!-- /.box-header -->
   <div class="box-body">
    <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="<?php echo e(route('agent-management.index')); ?>">
        <div class="form-group">
          <input type="search" name="search" class="form-control" placeholder="Search agent details" required>
        </div>
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search
          </button>
        </span>
      </form>
    </div>
            <div class="col-sm-4">
          <a style ="float: right"class="btn btn-primary" href="<?php echo e(route('agent-management.create')); ?>">Add new agent</a>
        </div>
      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Agent ID</th>
                <th>Agent Name</th>
                <th>Gender</th>
                <th>District</th> 
                <th>Agent Sign</th>
                <th>Role</th>
                <th id="regDate">Registration Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($agent->agent_id); ?></td>
                  <td><?php echo e($agent->agent_name); ?></td>
                  <td><?php echo e($agent->district_name); ?></td>
                  <td><?php echo e($agent->gender); ?></td> 
                  <td><?php echo e($agent->agent_sign); ?></td>
                  <td><?php echo e($agent->role); ?></td>
                  <td><?php echo e($agent->reg_date); ?></td>
                  <td><a href = 'edit/<?php echo e($agent->agent_id); ?>'>Edit</a></td>
                  <td><a href = 'destroy/<?php echo e($agent->agent_id); ?>'>Delete</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
      </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('agent_mgt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nmj/Desktop/groupWork/uft_party (copy)/resources/views/agent_mgt/index.blade.php ENDPATH**/ ?>