<ul>

<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <li>

       <?php echo e($child->name); ?>


   <?php if(count($child->childs)): ?>

            <?php echo $__env->make('manageChild',['childs' => $child->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>

   </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul><?php /**PATH C:\xampp\htdocs\angel1\resources\views/target_cats/manageChild.blade.php ENDPATH**/ ?>