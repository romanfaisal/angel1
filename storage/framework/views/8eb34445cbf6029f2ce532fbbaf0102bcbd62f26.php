
<?php $__env->startSection('title', $user->name); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Update<?php echo e($user->name); ?> Info</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"> Back</a>

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

  

    <form action="<?php echo e(route('users.update',$user->id)); ?>" method="POST">

        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control" placeholder="User Name" required="required" />

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>User Name:</strong>

                    <input type="text" name="username" value="<?php echo e($user->username); ?>" class="form-control" placeholder="User Name" required="required" />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" placeholder="User Email"  />

                </div>

            </div>
            
            
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Password:</strong>

                    <input type="password"  name="password"  value="<?php echo e($user->password); ?>" class="form-control" placeholder="User Password" />

                </div>

            </div>
            

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

   

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/users/edit.blade.php ENDPATH**/ ?>