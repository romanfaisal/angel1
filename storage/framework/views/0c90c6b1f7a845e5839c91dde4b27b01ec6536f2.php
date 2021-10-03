
<?php $__env->startSection('title', $target_unit->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show <?php echo e($target_unit->name); ?> Info </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('target_units.index')); ?>"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <?php echo e($target_unit->name); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Details:</strong>

                <?php echo e($target_unit->details); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Parent:</strong>

                <?php echo e($target_unit->parent_id); ?>


            </div>

        </div>
        
        
        

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/target_units/show.blade.php ENDPATH**/ ?>