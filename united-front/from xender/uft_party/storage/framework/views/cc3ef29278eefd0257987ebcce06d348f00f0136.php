<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
  <section class="content">
    <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-8">
            <h3 class="box-title">Fund Details</h3>
          </div>
        </div><br>
          <div class="col-sm-4" style="float:right">
           <a class="btn btn-secondary" href="<?php echo e(route('treasury-management.create')); ?>">Register new fund </a>
          </div>
      </div>
  <!-- /.box-header -->
      <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
        <div class="col-md-4" style="margin-bottom: 30px">
          <form method="get" action="<?php echo e(route('salary-management.index')); ?>">
               <?php echo e(csrf_field()); ?>

            <table class="table table-bordered table-stripped">
              <tr>
               <th style="font-size: 25px;color: darkcyan">Total monthly funds are: <span  style="font-size: 25px;color: black"><?php echo e($total_fund); ?></span></th>      
              </tr> 
           </table> 

          <!--<?php if (! ( $total_fund >= 2000000)): ?>
             <span class="input-group-prepend">
                <p style="font-size: 25px;color: red">Insufficient funds</p>        
             </span>
             <?php endif; ?>-->

         </form>
       </div>
      <br />
       <table class="table table-bordered table-stripped">
            <tr>
                <th>Fund Source</th>
                <th>Amount</th>
                <th>Date Received</th>
            </tr>
            <?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($fund->fund_source); ?></td>
                  <td><?php echo e($fund->amount); ?></td>
                  <td><?php echo e($fund->reg_date); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
   </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('treasury_mgt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uft_party\resources\views/treasury_mgt/index.blade.php ENDPATH**/ ?>