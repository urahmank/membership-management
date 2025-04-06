

<?php $__env->startPush('plugin-styles'); ?>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php endif; ?>

    <?php if($message = Session::get('warning')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard!</h4>
        </div>
    </div>
      
<?php $__env->stopSection(); ?>

<?php $__env->startPush('plugin-scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/chartjs/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery.flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery.flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/progressbar-js/progressbar.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\JES_Membership_Management\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>