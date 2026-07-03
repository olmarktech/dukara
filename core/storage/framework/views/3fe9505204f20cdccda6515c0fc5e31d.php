<?php
    // CTA Features Page Style - EXACT from page-features.html line 1137-1155
    // Left-aligned text with image on right, bg-secondary background
    $title = $data['title'] ?? 'Create stunning websites that fits your needs.';
    $button_text = $data['button_text'] ?? 'Try Lexend today';
    $button_url = $data['button_url'] ?? '';
    $button_subtext = $data['button_subtext'] ?? '14-day trial, no credit card required.';
    
    $image_light = !empty($data['image_light']) ? get_attachment_image_by_id($data['image_light'])['img_url'] ?? '' : '';
    $image_dark = !empty($data['image_dark']) ? get_attachment_image_by_id($data['image_dark'])['img_url'] ?? '' : '';
?>

<!-- Section start -->
<div id="cta" class="cta section panel overflow-hidden">
    <div class="section-outer panel py-4 xl:py-9">
        <div class="container max-w-xl">
            <div class="section-inner panel p-4 sm:p-6 xl:p-8 rounded-2 bg-secondary dark:bg-gray-800 overflow-hidden">
                <div class="vstack gap-2 max-w-550px items-center lg:items-start m-auto lg:m-0 text-center lg:text-start rtl:lg:text-end">
                    <h2 class="h3 sm:h1 m-0"><?php echo e($title); ?></h2>
                    <div class="vstack sm:hstack justify-center lg:justify-start gap-1 lg:gap-2 mt-1 lg:mt-2">
                        <a href="<?php echo e($button_url); ?>" class="btn btn-md btn-primary text-white"><?php echo e($button_text); ?></a>
                    </div>
                    <?php if($button_subtext): ?>
                        <p class="fs-7 text-dark dark:text-white text-opacity-70"><?php echo e($button_subtext); ?></p>
                    <?php endif; ?>
                </div>
                <?php if(!empty($image_light) || !empty($image_dark)): ?>
                    <div class="position-absolute top-50 ltr:end-0 rtl:start-0 translate-middle-y z-1 ltr:me-8 rtl:ms-8 d-none lg:d-block">
                        <?php if(!empty($image_light)): ?>
                            <img class="w-250px xl:w-300px d-block dark:d-none ltr:xl:me-7 rtl:xl:ms-7" src="<?php echo e($image_light); ?>" alt="charts">
                        <?php endif; ?>
                        <?php if(!empty($image_dark)): ?>
                            <img class="w-250px xl:w-300px d-none dark:d-block ltr:xl:me-7 rtl:xl:ms-7" src="<?php echo e($image_dark); ?>" alt="charts-dark">
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="position-absolute top-50 ltr:end-0 rtl:start-0 translate-middle-y z-1 ltr:me-8 rtl:ms-8 d-none lg:d-block">
                        <img class="w-250px xl:w-300px d-block dark:d-none ltr:xl:me-7 rtl:xl:ms-7" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/charts.svg')); ?>" alt="charts">
                        <img class="w-250px xl:w-300px d-none dark:d-block ltr:xl:me-7 rtl:xl:ms-7" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/charts-dark.svg')); ?>" alt="charts-dark">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/cta-features.blade.php ENDPATH**/ ?>