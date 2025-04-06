<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <ul class="navbar-nav">
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="profile">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="">
            </div>
            <div class="info text-center">
              <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                <p class="name font-weight-bold mb-0"><?php echo e(Auth::user()->name); ?></p>
              <?php else: ?>
                <?php if(isset(Auth::user()->employee)): ?>
                <a title="Edit" href=<?php echo e(url('employee/edit/'.encrypt(Auth::user()->employee->id))); ?>>
                  <p class="name font-weight-bold mb-0"><?php echo e(Auth::user()->name); ?></p>
                </a>
                <?php else: ?>
                
                <?php endif; ?>
              <?php endif; ?>
              <p class="email text-muted mb-3"><?php echo e(Auth::user()->email); ?></p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="<?php echo e(route('logout')); ?>" 
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav><?php /**PATH C:\xampp\htdocs\JES_Membership_Management\resources\views/layout/header.blade.php ENDPATH**/ ?>