
<?php $__env->startSection('title', $month->month_name); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show <?php echo e($month->month_name); ?> Info</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('months.index')); ?>"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Month Name:</strong>

                <?php echo e($month->month_name); ?>


            </div>

        </div>

        

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/months/show.blade.php ENDPATH**/ ?>