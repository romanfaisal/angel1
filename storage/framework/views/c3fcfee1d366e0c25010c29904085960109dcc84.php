
<?php $__env->startSection('title', 'Add New User'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New User</h2>

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

   

<form action="<?php echo e(route('users.store')); ?>" method="POST">

    <?php echo csrf_field(); ?>

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" class="form-control" placeholder="Name" required="required" />

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>User Name:</strong>

                    <input type="text" name="username"  class="form-control" placeholder="User Name" required="required" />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email"  name="email"  class="form-control" placeholder="User Email"  />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Password:</strong>

                    <input type="password"  name="password" class="form-control" placeholder="User Password" />

                </div>

            </div>
            
            


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

   

</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/users/create.blade.php ENDPATH**/ ?>