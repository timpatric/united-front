<?php $__env->startSection('action-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new district</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('district-management.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-4 control-label">District</label>

                            <div class="col-md-6">
                                <input id="district_name" type="text" class="form-control" name="district_name" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">District Code</label>

                            <div class="col-md-6">
                                <input id="district_code" type="text" class="form-control" name="district_code" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                 </button>
                                 <button type="submit" class="btn btn-danger">
                                     <a style="color:white"href="<?php echo e(route('district-management.index')); ?>">Back</a>
                                </button>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('district_mgt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\uft_party\resources\views/district_mgt/create.blade.php ENDPATH**/ ?>