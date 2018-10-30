<?php $__env->startSection('content'); ?>

<div style="width:500px;height" ><?php echo $chart->render(); ?></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>