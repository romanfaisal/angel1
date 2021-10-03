
<?php $__env->startSection('title', 'Add New User Achievement'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New User Achievement</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="<?php echo e(route('user_achievements.index')); ?>"> Back</a>

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

   

<form action="<?php echo e(route('user_achievements.store')); ?>" method="POST">

    <?php echo csrf_field(); ?>

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>User:</strong>
                    <select name="user_id" class="form-control">
                    	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Month:</strong>
                    <select name="month_id" class="form-control">
                    	<?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<option value="<?php echo e($month->id); ?>"><?php echo e($month->month_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Year:</strong>

                    <input type="text" name="year"  value="<?php echo e(date('Y')); ?>" class="form-control" placeholder="Year" required="required" />

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Target Type:</strong>
                    <select name="target_type_id" class="form-control">
                    	 <?php $__currentLoopData = $load_target_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load_target_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
                               $tree_view="= = = = = = = =>";
                               $select_id=0;
                        ?>
                            <option  value="<?php echo e($load_target_cat->id); ?>">

                               <?php echo e($tree_view); ?> <?php echo e($load_target_cat->name); ?>


                                <?php if(count($load_target_cat->childs)): ?>
									<?php
                                    	$tree_view.="= = = = = = = =>";
                                    ?>
                                    <?php echo $__env->make('layouts.manageChild',['childs' => $load_target_cat->childs,'tree_view','select_id' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endif; ?>

                            </option>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Target Unit:</strong>
                    <select name="target_unit_id" class="form-control">
                    	<?php $__currentLoopData = $load_target_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load_target_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
                               $tree_view="= = = = = = = =>";
                               $select_id=0;
                        ?>
                            <option  value="<?php echo e($load_target_unit->id); ?>">

                               <?php echo e($tree_view); ?> <?php echo e($load_target_unit->name); ?>


                                <?php if(count($load_target_unit->childs)): ?>
									<?php
                                    	$tree_view.="= = = = = = = =>";
                                    ?>
                                    <?php echo $__env->make('layouts.manageChild',['childs' => $load_target_unit->childs,'tree_view','select_id' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endif; ?>

                            </option>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Amount:</strong>

                    <input type="text" name="achievement_amount"  class="form-control" placeholder="Amount" required="required" />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Member</strong>
                    <select name="member_id" class="form-control">
                    	<option value="0">Select Member</option>
                        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<option value="<?php echo e($member->id); ?>"><?php echo e($member->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Client Info :</strong>

                   <textarea name="client_info" class="form-control" placeholder="Client Info" ></textarea>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Note :</strong>

                   <textarea name="note" class="form-control" placeholder="Note" > </textarea>

                </div>

            </div>
            

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

   

</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/user_achievements/create.blade.php ENDPATH**/ ?>