<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo Purifier::clean(session('msg')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/components/flash-msg.blade.php ENDPATH**/ ?>