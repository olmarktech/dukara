<?php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
    $section_id = $data['section_id'] ?? '';
?>


<div id="<?php echo e($section_id); ?>" class="counter-section section panel" style="padding-top: <?php echo e($padding_top); ?>px; padding-bottom: <?php echo e($padding_bottom); ?>px;">
    <div class="container">
        <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match justify-center g-4">
            <?php if(array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="panel text-center" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100);">
                            <h3 class="h2 lg:h1 m-0 text-primary dark:text-quaternary">
                                <?php echo e($data['repeater_data']['repeater_number_'][$key] ?? '0'); ?><span>+</span>
                            </h3>
                            <p class="fs-5 lg:fs-4 fw-medium mt-1 dark:text-white"><?php echo e($title); ?></p>
                            <?php if(!empty($data['repeater_data']['repeater_description_'][$key])): ?>
                                <p class="fs-6 opacity-70 mt-1"><?php echo e($data['repeater_data']['repeater_description_'][$key]); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/number_counter.blade.php ENDPATH**/ ?>