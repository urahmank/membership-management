

<?php $__env->startPush('plugin-styles'); ?>
  <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('assets/plugins/datatables-net/dataTables.bootstrap4.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('user/view')); ?>">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">View</li>
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
  
  <?php if($message = Session::get('warning')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Warning!</strong> <?php echo e($message); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6 class="card-title">User List</h6>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Add User')): ?>
              <div class="col-md-6">
                <a href="<?php echo e(url('user/add')); ?>" type="button" class="btn btn-primary" style="float:right;">Add User</a>
              </div>
            <?php endif; ?>
          </div>
          <div class="table-responsive pt-3">
            <table id="dataTableExample" class="table table-hover">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Username
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Role
                  </th>
                  <th class="text-center" data-orderable="false">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serial => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($serial + 1); ?></td>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user->roles[0]->name); ?></td>
                  <td class="text-center">
                    <?php if($user->id != '1'): ?>  
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                        <a title="Edit" href="<?php echo e(url('user/edit/'.encrypt($user->id))); ?>">
                          <button type="button" class="btn btn-primary btn-icon">
                            <i data-feather="edit"></i>
                          </button>
                        </a>
                      <?php endif; ?>                  
                      
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                        <a title="Delete" data-toggle="modal" data-target="#actionModal<?php echo e($serial); ?>">
                          <button type="button" class="btn btn-primary btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                        </a>
                        <div class="modal fade text-left" id="actionModal<?php echo e($serial); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm your action!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete this user?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="<?php echo e(url('user/destroy/'.encrypt($user->id))); ?>" type="button" class="btn btn-primary">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
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
  <script src="<?php echo e(asset('assets/plugins/datatables-net/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('custom-scripts'); ?>
  <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/data-table.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\JES_Membership_Management\resources\views/dashboard/users/view.blade.php ENDPATH**/ ?>