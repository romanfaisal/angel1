
<?php $__env->startSection('title', 'Target Units'); ?>
<?php $__env->startSection('content'); ?>
<?php
$i=1;
?>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Target Units</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="<?php echo e(route('target_units.create')); ?>"> Create New Target Unit</a>

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
                <th>Details</th>
                <th>Parent</th>                
        	</tr>
        </thead>
 		<tbody>
        	<?php $__currentLoopData = $target_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
				<td>
	                <form action="<?php echo e(route('target_units.destroy',$target_unit->id)); ?>" method="POST">
	                    <a class="btn btn-info" href="<?php echo e(route('target_units.show',$target_unit->id)); ?>">Show</a>
	                    <a class="btn btn-primary" href="<?php echo e(route('target_units.edit',$target_unit->id)); ?>">Edit</a>
		                <?php echo csrf_field(); ?>
	                    <?php echo method_field('DELETE'); ?>
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td><?php echo e($i++); ?></td>
            	<td><?php echo e($target_unit->name); ?></td>
                <td><?php echo e($target_unit->details); ?></td>
                <td><?php echo e($target_unit->parent_id); ?></td>               
        	</tr>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
		<tfoot>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>Name</th>
                <th>Description</th>
                <th>Parent</th> 
        	</tr>
        </tfoot>
    </table>
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/target_units/index.blade.php ENDPATH**/ ?>