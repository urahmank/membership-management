<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <!-- PurchaseOrder<span>MS</span> -->
            <img src="<?php echo e(asset('assets/images/icon.png')); ?>" style="width:100px;">

        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item <?php echo e(active_class(['/'])); ?>">
                <a href="<?php echo e(url('/')); ?>" class="nav-link">
                    <i class="link-icon" data-feather="airplay"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View Role', 'View User'])): ?>
                <li class="nav-item nav-category">User Management</li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View Role'])): ?>
                    <li class="nav-item <?php echo e(active_class(['role/*'])); ?>">
                        <a href="<?php echo e(url('role/view')); ?>" class="nav-link">
                            <i class="link-icon" data-feather="sliders"></i>
                            <span class="link-title">Roles</span>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View User'])): ?>
                    <li class="nav-item <?php echo e(active_class(['user/*'])); ?>">
                        <a href="<?php echo e(url('user/view')); ?>" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Users</span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\JES_Membership_Management\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>