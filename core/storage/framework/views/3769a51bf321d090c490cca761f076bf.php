<?php
    // Main Features section - EXACT from index-13.html line 1084-1148
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
?>

<!-- Section start -->
<div id="main_features" class="main-features section panel overflow-hidden">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10 lg:mx-2 rounded-bottom-2 xl:rounded-bottom-3 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel">
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-6 sm:mb-8 xl:mb-9 max-w-700px mx-auto text-center" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                    <?php if($title): ?>
                        <?php
                            if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                $text = explode('{h}', $title);
                                $highlighted_word = explode('{/h}', $text[1])[0];
                                $before_text = $text[0];
                                $after_parts = explode('{/h}', $text[1]);
                                $after_text = $after_parts[1] ?? '';
                                $final_title = $before_text . '<span class="text-primary dark:text-quaternary">' . $highlighted_word . '</span>' . $after_text;
                            } else {
                                $final_title = $title;
                            }
                        ?>
                        <h2 class="h3 sm:h2 xl:h1 m-0"><?php echo $final_title; ?></h2>
                    <?php endif; ?>
                </div>
                <div class="section-content panel">
                    <div class="row child-cols-12 md:child-cols-6 col-match g-2 lg:g-4" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        <?php if(array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                            <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="feature-item panel overflow-hidden p-2 bg-white border border-1 dark:bg-opacity-5 dark:text-white rounded-2 xl:rounded-3">
                                        <div class="panel vstack items-start gap-1 xl:gap-2 p-1 pb-2 lg:p-3 xl:p-4">
                                            <h4 class="h4 xl:h3 m-0 text-inherit"><?php echo e($data['repeater_data']['repeater_title_'][$key]); ?></h4>
                                            <p class="fs-6 xl:fs-5 text-gray-400 dark:text-gray-200"><?php echo e($data['repeater_data']['repeater_description_'][$key]); ?></p>
                                        </div>
                                        <div class="panel">
                                            <?php if(!empty($data['repeater_data']['repeater_image_'][$key])): ?>
                                                <?php echo render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], $data['repeater_data']['repeater_title_'][$key], 'full', false, ['class' => 'rounded-2']); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="section-footer panel vstack gap-2 items-center mt-6 sm:mt-8 xl:mt-9" data-anime="translateY: [24, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 750;">
                    <?php if(!empty($data['cta_button_text']) && !empty($data['cta_button_url'])): ?>
                        <a href="<?php echo e($data['cta_button_url']); ?>" class="btn btn-md xl:btn-lg btn-primary dark:bg-quaternary dark:border-quaternary dark:text-dark fs-6 rounded-pill px-5 lg:px-7 w-auto">
                            <span><?php echo e($data['cta_button_text']); ?></span>
                        </a>
                        <?php if(!empty($data['cta_button_subtext'])): ?>
                            <span class="fs-7 dark:text-white text-opacity-75"><?php echo e($data['cta_button_subtext']); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/FeaturesOne.blade.php ENDPATH**/ ?>