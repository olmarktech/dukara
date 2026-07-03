<?php if($errors->any()): ?>
    <div class="alert alert-danger search-results-fields">
        <ul class="list-none alert_list_inline">
            <button type="button btn-sm" class="close" data-bs-dismiss="alert">×</button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($loop->iteration); ?>. <?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/components/error-msg.blade.php ENDPATH**/ ?>