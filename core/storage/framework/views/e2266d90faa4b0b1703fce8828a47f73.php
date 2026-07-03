<?php
    // FAQ section - Supports 2 styles:
    // 1. default: Individual cards - EXACT from index-13.html line 1551-1600
    // 2. boxed: Boxed container - EXACT from page-contact.html line 863-908
    $display_style = $data['display_style'] ?? 'default';
    $title = $data['title'] ?? '';
    $cta_button_text = $data['cta_button_text'] ?? '';
    $cta_button_url = $data['cta_button_url'] ?? '';
?>

<?php if($display_style === 'boxed'): ?>

<!-- Section start -->
<div id="faq" class="section panel overflow-hidden">
    <div class="section-outer panel pb-7 sm:pb-8 xl:pb-9">
        <div class="container max-w-lg">
            <div class="section-inner panel" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                <div class="panel">
                    <?php if($title): ?>
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center"><?php echo e($title); ?></h2>
                    <?php endif; ?>
                    <div class="panel mt-4 sm:mt-6 lg:mt-8 p-3 sm:p-4 xl:p-6 lg:max-w-750px xl:w-auto m-auto rounded-2 bg-secondary dark:bg-gray-800">
                        <ul class="gap-4" data-uc-accordion="targets: > li;">
                            <?php if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                                <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php echo e($key == 0 ? 'uc-open' : ''); ?>">
                                        <a class="uc-accordion-title fs-5 sm:fs-4" href="#"><?php echo e($faq_title); ?></a>
                                        <div class="uc-accordion-content">
                                            <p><?php echo e($data['repeater_data']['repeater_description_'][$key] ?? ''); ?></p>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->

<?php else: ?>

<!-- Section start -->
<div id="faq" class="faq section panel mt-2 xl:mt-4">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container lg:max-w-lg">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-9 max-w-700px mx-auto text-center">
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
                    <ul class="uc-accordion gap-1 max-w-md xl:max-w-lg mx-auto" data-uc-accordion="targets: > li; multiple: false;">
                        <?php if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                            <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="panel p-2 md:p-3 lg:p-4 bg-secondary dark:bg-gray-800 rounded-2 <?php echo e($key == 0 ? 'uc-open' : ''); ?>">
                                    <a class="uc-accordion-title h6 md:h5 lg:h5 fw-bold ltr:pe-4 rtl:ps-4" href="#"><?php echo e($faq_title); ?></a>
                                    <div class="uc-accordion-content lg:fs-5 opacity-70">
                                        <p><?php echo e($data['repeater_data']['repeater_description_'][$key] ?? ''); ?></p>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php if($cta_button_text && $cta_button_url): ?>
                    <div class="section-footer panel vstack gap-2 items-center mt-6 sm:mt-8 xl:mt-9">
                        <a href="<?php echo e($cta_button_url); ?>" class="btn btn-md lg:btn-lg btn-outline-dark fs-6 px-4 dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill">
                            <span><?php echo e($cta_button_text); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->
<?php endif; ?>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/faq.blade.php ENDPATH**/ ?>