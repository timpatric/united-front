<?php if(!$model->container): ?>

	<?php echo $__env->make('charts::_partials.loader.container-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div id="<?php echo e($model->id); ?>" style="<?php echo $__env->make('charts::_partials.dimension.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>"></div>
	<?php echo $__env->make('charts::_partials.loader.container-bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/nmj/Desktop/united-front/from xender/uft_party/resources/views/vendor/charts/_partials/container/div.blade.php ENDPATH**/ ?>