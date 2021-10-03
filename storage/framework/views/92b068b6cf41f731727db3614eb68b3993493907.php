
<?php $__env->startSection('title', $target_cat->name); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Update<?php echo e($target_cat->name); ?> Info</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('target_cats.index')); ?>"> Back</a>

            </div>

        </div>

    </div>

   

    <?php if($errors->any()): ?>

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li><?php echo e($error); ?></li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </div>

    <?php endif; ?>

  

    <form action="<?php echo e(route('target_cats.update',$target_cat->id)); ?>" method="POST">

        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="<?php echo e($target_cat->name); ?>" class="form-control" placeholder="Target Cats Name" required="required" />

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Details :</strong>

                   <textarea name="details" class="form-control" placeholder="Target Cats Details" ><?php echo e($target_cat->details); ?></textarea>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Parent:</strong>
                    <select name="parent_id" class="form-control">
                    	 <option value="0">Parent</option>                      
                         <?php $__currentLoopData = $load_target_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load_target_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
                               $tree_view="= = = = = = = =>";
                        	?>
                            <option  value="<?php echo e($load_target_cat->id); ?>" <?php if($target_cat->parent_id==$load_target_cat->id): ?> 
                                 		selected="selected" <?php endif; ?> >
                               <?php echo e($tree_view); ?> <?php echo e($load_target_cat->name); ?>

                                <?php if(count($load_target_cat->childs)): ?>
									<?php
                                    	$tree_view.="= = = = = = = =>";
                                        $select_id=$target_cat->parent_id;
                                    ?>
                                    <?php echo $__env->make('layouts.manageChild',['childs' => $load_target_cat->childs,'tree_view','select_id' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endif; ?>

                            </option>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

            </div>
            
            
            
            
            

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

   

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/target_cats/edit.blade.php ENDPATH**/ ?>