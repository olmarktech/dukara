<?php echo $__env->make('landlord.admin.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> <?php echo $__env->yieldContent('title'); ?> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('landlord.admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $__env->yieldContent('title'); ?></li>
                </ol>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

 <?php echo $__env->make('landlord.admin.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/landlord//admin/admin-master.blade.php ENDPATH**/ ?>