
<?php $__env->startSection('title', 'Months'); ?>
<?php $__env->startSection('content'); ?>
<?php
$i=1;
?>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Months</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="<?php echo e(route('months.create')); ?>"> Create New Month</a>

            </div>

        </div>

    </div>
    
     <?php if($message = Session::get('success')): ?>

        <div class="alert alert-success">

            <p><?php echo e($message); ?></p>

        </div>

    <?php endif; ?>
    
    <table class="table table-bordered" id="example" width="100%" border="1" cellspacing="0" cellpadding="0">
		<thead>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>Name</th>
        	</tr>
        </thead>
 		<tbody>
        	<?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
				<td>
	                <form action="<?php echo e(route('months.destroy',$month->id)); ?>" method="POST">
	                    <a class="btn btn-info" href="<?php echo e(route('months.show',$month->id)); ?>">Show</a>
	                    <a class="btn btn-primary" href="<?php echo e(route('months.edit',$month->id)); ?>">Edit</a>
		                <?php echo csrf_field(); ?>
	                    <?php echo method_field('DELETE'); ?>
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td><?php echo e($i++); ?></td>
            	<td><?php echo e($month->month_name); ?></td>
        	</tr>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
		<tfoot>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>Name</th>
        	</tr>
        </tfoot>
    </table>
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/months/index.blade.php ENDPATH**/ ?>