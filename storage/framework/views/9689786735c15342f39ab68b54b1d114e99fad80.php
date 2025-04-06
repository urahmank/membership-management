

<?php $__env->startSection('content'); ?>
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
      <img src="<?php echo e(url('assets/images/404.svg')); ?>" class="img-fluid mb-2" alt="404">
      <h1 class="font-weight-bold mb-22 mt-2 tx-80 text-muted">404</h1>
      <h4 class="mb-2">Page Not Found</h4>
      <h6 class="text-muted mb-3 text-center">Oopps!! The page you were looking for doesn't exist.</h6>
      <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Back to home</a>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\JES_Membership_Management\resources\views/errors/404.blade.php ENDPATH**/ ?>