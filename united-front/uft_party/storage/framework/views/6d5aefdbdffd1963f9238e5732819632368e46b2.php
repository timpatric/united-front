<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
    <section class="content">
      <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of party members</h3>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

       <div class="col-md-3" style="margin-bottom: 30px">
          <form method="get" action="<?php echo e(route('member-management.index')); ?>">
            <div class="form-group">
              <input type="search" name="search" class="form-control" required>
            </div>
            <span class="input-group-prepend">
               <button type="submit" class="btn btn-primary">Search
               </button>
            </span>
          </form>
        </div>
        <div class="col-md-3" style="margin-bottom: 30px">
          <form method="get" action="<?php echo e(route('agent-management.index')); ?>">
                <?php echo e(csrf_field()); ?>

          <table class="table table-bordered table-stripped">
              <tr>
                <th style="font-size: 20px;color:green">Pending Upgrades</th>      
              </tr>
              <tr>
                <td><?php echo e($member_upgrade); ?></td>
              </tr>
         </table>
              <span class="input-group-prepend">
                  <button type="submit" class="btn btn-primary">Upgrade
                  </button>
              </span>
          </form>
        </div>

      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Gender</th>
                <th>District</th>
                <th>Agent Name</th> 
                <th>Recommender Name</th>
                <th id="regDate">Enrollment Date</th>
                <th>Delete</th>
            </tr>
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($member->member_id); ?></td>
                  <td><?php echo e($member->member_name); ?></td>
                  <td><?php echo e($member->gender); ?></td>
                  <td><?php echo e($member->district_name); ?></td>
                  <td><?php echo e($member->agent_name); ?></td> 
                  <td><?php echo e($member->rec_name); ?></td>
                  <td><?php echo e($member->reg_date); ?></td>
                  <td><a href = 'delete/<?php echo e($member->member_id); ?>'>Delete</a></td>
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
<?php echo $__env->make('member_mgt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nmj/Desktop/groupWork/uft_party/resources/views/member_mgt/index.blade.php ENDPATH**/ ?>