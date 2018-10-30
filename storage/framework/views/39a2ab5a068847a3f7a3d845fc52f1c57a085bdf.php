<?php $__env->startSection('content'); ?>

<?php /* <?php foreach($data as $d): ?>
		<p><?php echo e($d->moneda); ?></p>
		<p><?php echo e($d->valoare); ?></p>
		<p><?php echo e($d->data); ?></p>
<?php endforeach; ?> */ ?>
		
	<?php foreach($data as $d): ?>
 		<p><?php echo e($d->valoare); ?></p>
	<?php endforeach; ?>


<?php echo e(Form::open(['route' => ['pages.update', null]])); ?>

<?php echo e(Form::text('value', null)); ?>

<select name="currency1" >
	<?php foreach($data as $d): ?>
		<option value="<?php echo e($d->valoare); ?>"><?php echo e($d->moneda); ?></option>
	<?php endforeach; ?>
</select>

<select name="currency2" >
	<?php foreach($data as $d): ?>
		<option value="<?php echo e($d->valoare); ?>"><?php echo e($d->moneda); ?></option>
	<?php endforeach; ?>
</select>
<?php echo e(Form::submit('Search')); ?>

<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>