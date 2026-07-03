<?php
    $brands = $data['brands'] ?? [];
    $padding_top = $data['padding_top'] ?? '40px';
    $padding_bottom = $data['padding_bottom'] ?? '40px';
?>
<!-- Section start -->
<div id="brands" class="brands section panel overflow-hidden" style="padding-top: <?php echo e($padding_top); ?>; padding-bottom: <?php echo e($padding_bottom); ?>;">
    <div class="section-outer panel pt-6 sm:pt-8 xl:pt-9 lg:mx-2 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel text-center xl:mx-9" data-anime="onview: -200; translateY: [-16, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: 350;">
                <div class="brands panel">
                    <div class="row child-cols-4 sm:child-cols items-center justify-center text-center g-2 sm:g-6 xl:g-9">
                        <?php if(!empty($brands)): ?>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <?php if(!empty($brand['brand_image'])): ?>
                                        <?php
                                            $brand_img = get_attachment_image_by_id($brand['brand_image']);
                                        ?>
                                        <img class="dark:d-none" src="<?php echo e($brand_img['img_url'] ?? ''); ?>" alt="<?php echo e($brand['brand_alt'] ?? 'Brand'); ?>">
                                        <img class="d-none dark:d-block" src="<?php echo e($brand_img['img_url'] ?? ''); ?>" alt="<?php echo e($brand['brand_alt'] ?? 'Brand'); ?>">
                                    <?php else: ?>
                                        <img class="dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-09.svg')); ?>" alt="Brand">
                                        <img class="d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-09-dark.svg')); ?>" alt="Brand">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            
                            <div>
                                <img class="dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-09.svg')); ?>" alt="Hello">
                                <img class="d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-09-dark.svg')); ?>" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-05.svg')); ?>" alt="Hello">
                                <img class="d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-05-dark.svg')); ?>" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-10.svg')); ?>" alt="Hello">
                                <img class="d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-10-dark.svg')); ?>" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-11.svg')); ?>" alt="Hello">
                                <img class="d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-11-dark.svg')); ?>" alt="Hello">
                            </div>
                            <div>
                                <img class="dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-12.svg')); ?>" alt="Hello">
                                <img class="d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/brands/brand-12-dark.svg')); ?>" alt="Hello">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



<?php /**PATH C:\wamp64\www\jihost_v1\core\plugins\PageBuilder/views/tenant/lexend-v4/brands.blade.php ENDPATH**/ ?>