<?php
    // Key Features section - EXACT from index-13.html line 1153-1252
    $title = $data['title'] ?? '';
?>

<!-- Section start -->
<div id="key_features" class="key-features section panel overflow-hidden">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10 lg:mx-2 mt-2">
        <div class="position-absolute top-0 start-0 end-0 w-100 h-100 bg-gradient-45n from-quaternary to-tertiary rounded-2 xl:rounded-3 dark:d-none"></div>
        <div class="container">
            <div class="section-inner panel">
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-9 max-w-700px mx-auto text-center" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
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
                    <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match g-2 lg:g-3 xl:g-4" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        <?php if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                            <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                        <div class="icon-box">
                                            <?php if(!empty($data['repeater_data']['repeater_icon_'][$key])): ?>
                                                <i class="<?php echo e($data['repeater_data']['repeater_icon_'][$key]); ?> icon-2 text-primary dark:text-quaternary"></i>
                                            <?php elseif(!empty($data['repeater_data']['repeater_image_'][$key])): ?>
                                                <img class="w-48px h-48px text-primary dark:text-quaternary" src="<?php echo e(get_attachment_image_by_id($data['repeater_data']['repeater_image_'][$key])['img_url'] ?? ''); ?>" alt="feature-icon" data-uc-svg>
                                            <?php endif; ?>
                                        </div>
                                        <div class="panel">
                                            <div class="vstack gap-1">
                                                <h3 class="title h5 lg:h4 m-0"><?php echo e($data['repeater_data']['repeater_title_'][$key] ?? ''); ?></h3>
                                                <p class="desc fs-6 text-gray-400 dark:text-gray-200"><?php echo e($data['repeater_data']['repeater_description_'][$key] ?? ''); ?></p>
                                            </div>
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
                            <span class="fs-7 text-gray-900 dark:text-white"><?php echo e($data['cta_button_subtext']); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/why-choose.blade.php ENDPATH**/ ?>