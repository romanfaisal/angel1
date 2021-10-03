
<?php $__env->startSection('title', 'Achievement Info'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Achievement Info </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('user_achievements.index')); ?>"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>User:</strong>

                <?php echo e($user_achievement->user_id); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Month:</strong>

                <?php echo e($user_achievement->month_id); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Year:</strong>

                <?php echo e($user_achievement->year); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Type:</strong>

                <?php echo e($user_achievement->target_type_id); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Unit:</strong>

                <?php echo e($user_achievement->target_unit_id); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Amount:</strong>

                <?php echo e($user_achievement->achievement_amount); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strongMember Name:</strong>

                <?php echo e($user_achievement->member_id); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Client Info:</strong>

                <?php echo e($user_achievement->client_info); ?>


            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Note:</strong>

                <?php echo e($user_achievement->note); ?>


            </div>

        </div>
        

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\angel1\resources\views/user_achievements/show.blade.php ENDPATH**/ ?>