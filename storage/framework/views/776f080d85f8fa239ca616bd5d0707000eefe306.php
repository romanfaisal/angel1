<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <option value="<?php echo e($child->id); ?>" >

     <?php echo e($tree_view); ?><?php echo e($child->name); ?>


   <?php if(count($child->childs)): ?>
			<?php
               	$tree_view.="=====>";
            ?>	
            <?php echo $__env->make('manageChild',['childs' => $child->childs,'tree_view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>

   </option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\xampp\htdocs\angel1\resources\views/manageChild.blade.php ENDPATH**/ ?>