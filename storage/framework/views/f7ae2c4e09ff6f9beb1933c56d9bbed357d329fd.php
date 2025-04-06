

<?php $__env->startPush('plugin-styles'); ?>
  <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('user/view')); ?>">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add</li>
    </ol>
  </nav>

  <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> <?php echo e($message); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Create a New User</h6>
           <form method="POST" action="<?php echo e(url('user/store')); ?>" class="forms-sample" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="name">User Name<span style="color:red;"> *</span></label>
              <input required type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="e.g. User Name">
            </div>
            <div class="form-group">
              <label for="email">Email<span style="color:red;"> *</span></label>
              <input required type="email" class="form-control" id="email" name="email" placeholder="user@email.com">
            </div>
            <div class="form-group">
              <label for="password">Password <span style="color:red;"> *</span></label>
              <input required type="password" class="form-control" id="password" name="password" placeholder="*******">
            </div>
            <div class="form-group">
              <label for="role">Select Role for this User</label>
              <select class="js-example-basic-single w-100" id="role" name="role">
                <option selected value="">Select</option>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-light"  href="<?php echo e(url('user/view')); ?>">Cancel</a>
          </form>
        </div>
      </div>
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
  <script src="<?php echo e(asset('assets/plugins/select2/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('custom-scripts'); ?>
  <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\JES_Membership_Management\resources\views/dashboard/users/add.blade.php ENDPATH**/ ?>