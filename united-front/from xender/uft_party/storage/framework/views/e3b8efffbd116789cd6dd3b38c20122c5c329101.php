<?php if(count($errors)>0): ?>

    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $error->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>
<?php endif; ?>

<?php if(\Session::has('success')): ?>
    
    <div class="alert alert-success">
        <p><?php echo e(\Session::get('success')); ?></p>

    </div>                 

<?php endif; ?><?php /**PATH /home/nmj/Desktop/groupWork/uft_party (copy)/resources/views/layouts/message.blade.php ENDPATH**/ ?>