<?php $__env->startSection('content'); ?>
<h4> <?php echo e(isset($result) ? 'Rezultat: '.number_format($result, 4).' '.$moneda2[0]->moneda : 'Select your currency'); ?> </h4>

<p> <?php echo e((isset($val1) && isset($moneda1[0]->moneda)) ? '1 '.$moneda1[0]->moneda.' = ' : ''); ?> <?php echo e((isset($val2) && isset($moneda2[0]->moneda)) ? number_format($val1 / $val2, 4).' '.$moneda2[0]->moneda : ''); ?> </p>

<?php echo e(Form::open(['route' => ['convert.data', null], 'method' => 'POST'])); ?>

<?php echo e(Form::text('value', null)); ?>

<select name="currency1" >
	<?php foreach($options as $d): ?>
		<option value="<?php echo e($d->valoare); ?>"><?php echo e($d->moneda); ?></option>
	<?php endforeach; ?>
</select>

<select name="currency2" >
	<?php foreach($options as $d): ?>
		<option value="<?php echo e($d->valoare); ?>"><?php echo e($d->moneda); ?></option>
	<?php endforeach; ?>
</select>
<input type="hidden" value="<?php echo e(isset($dt) ? $dt : ''); ?>" name="dt">
<?php echo e(Form::submit('Search')); ?>

<?php echo e(Form::close()); ?>

<a href=" <?php echo e(route('pages.chart')); ?> ">Check the euro graph</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>