<?php
    // Pricing Plans - EXACT from index-13.html line 1259-1437
    // Swiper slider style with different card design
    $title = $data['title'] ?? 'Scalable and affordable prices*';
    $all_price_plan = $data['all_price_plan'] ?? [];
    $plan_types = $data['plan_types'] ?? collect();
    
    // Normalize array keys to integers for proper matching (keep Eloquent models intact)
    $normalized_price_plan = [];
    foreach ($all_price_plan as $key => $value) {
        $normalized_price_plan[(int) $key] = $value;
    }
    $all_price_plan = $normalized_price_plan;
    
    // Get the first plan type's plans for display
    $first_plan_type = !empty($plan_types) ? (int)$plan_types->first() : 0;
    $display_plans = $all_price_plan[$first_plan_type] ?? [];
?>

<!-- Section start -->
<div id="pricing" class="pricing section panel overflow-hidden mx-1 lg:mx-2 mt-1 xl:mt-2 mb-2 rounded-2 xl:rounded-3 bg-secondary dark:bg-gray-800">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
            <div class="container">
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
                        <div class="swiper overflow-unset lg:overflow-hidden" data-uc-swiper="items: 1.05; gap: 8; active: 1; center: true; center-bounds: true;" data-uc-swiper-s="items: 2.1; gap: 16;" data-uc-swiper-m="items: 3; gap: 16;" data-uc-swiper-l="items: 3; gap: 24;">
                            <div class="swiper-wrapper">
                                <?php if(!empty($display_plans) && count($display_plans) > 0): ?>
                                    <?php $__currentLoopData = $display_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $is_popular = !empty($plan->package_badge) || $index == 1;
                                            // Get plan features - handle both Eloquent and array cases
                                            $plan_features = $plan->plan_features ?? collect();
                                            if (!($plan_features instanceof \Illuminate\Support\Collection)) {
                                                $plan_features = collect($plan_features);
                                            }
                                        ?>
                                        <div class="swiper-slide">
                                            <?php if($is_popular && $index == 1): ?>
                                                
                                                <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 text-white dark:text-dark shadow-xs bg-gray-800 dark:bg-secondary">
                                                    <div class="pricing-box-title hstack gap-1 mb-narrow">
                                                        <span class="fs-3 ft-secondary fw-bold text-white dark:text-dark"><?php echo e($plan->title); ?></span>
                                                        <?php if(!empty($plan->package_badge)): ?>
                                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-yellow text-dark"><?php echo e($plan->package_badge); ?></span>
                                                        <?php else: ?>
                                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-yellow text-dark"><?php echo e(__('Most Popular')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="pricing-box-desc fs-7 text-white dark:text-dark opacity-70"><?php echo e($plan->package_description ?? __('Manage your fast growing team or business')); ?></p>
                                                    <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                                        <h4 class="price h1 lg:display-6 xl:display-5 m-0 text-white dark:text-dark"><?php echo e(amount_with_currency_symbol($plan->price)); ?></h4>
                                                        <span class="duration fs-7 text-opacity-70 mb-1">/<?php echo e(__('mo')); ?></span>
                                                    </div>
                                                    <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4 w-100">
                                                        <a href="<?php echo e(route('landlord.frontend.plan.order', $plan->id)); ?>" class="btn btn-md xl:btn-lg btn-primary rounded-pill"><?php echo e(__('Start a free trial')); ?></a>
                                                        <span class="fs-7 text-white dark:text-dark opacity-70"><?php echo e(__('No credit card required.')); ?></span>
                                                    </div>
                                                    <ul class="nav-y gap-1 fs-7 xl:fs-6 text-white dark:text-dark">
                                                        <?php if($plan_features->count() > 0): ?>
                                                            <?php $__currentLoopData = $plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                    $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                ?>
                                                                <?php if($feat_status): ?>
                                                                    <li class="row child-cols items-start g-1">
                                                                        <div class="col-auto">
                                                                            <img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;">
                                                                        </div>
                                                                        <div>
                                                                            <span><?php echo e($feat_name); ?></span>
                                                                        </div>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php if($plan->page_permission_feature !== null): ?>
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span><?php echo e($plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature)); ?></span></div>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($plan->product_permission_feature !== null): ?>
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span><?php echo e($plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature)); ?></span></div>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($plan->storage_permission_feature !== null): ?>
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span><?php echo e($plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature)); ?></span></div>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            <?php else: ?>
                                                
                                                <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 bg-white dark:bg-opacity-5 text-dark shadow-xs">
                                                    <?php if(!empty($plan->package_badge) && $index != 1): ?>
                                                        <div class="pricing-box-title hstack gap-1 mb-narrow">
                                                            <span class="fs-3 ft-secondary fw-bold dark:text-white"><?php echo e($plan->title); ?></span>
                                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-quaternary"><?php echo e($plan->package_badge); ?></span>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="pricing-box-title fs-3 ft-secondary fw-bold mb-narrow dark:text-white"><?php echo e($plan->title); ?></span>
                                                    <?php endif; ?>
                                                    <p class="pricing-box-desc fs-7 dark:text-white opacity-70"><?php echo e($plan->package_description ?? __('Basic features and reporting.')); ?></p>
                                                    <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                                        <?php if($plan->price > 0): ?>
                                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 dark:text-white"><?php echo e(amount_with_currency_symbol($plan->price)); ?></h4>
                                                            <span class="duration fs-7 dark:text-white opacity-70 mb-1">/<?php echo e(__('mo')); ?></span>
                                                        <?php else: ?>
                                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 dark:text-white"><?php echo e(__('Free')); ?></h4>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4 w-100">
                                                        <?php if($plan->price > 0): ?>
                                                            <a href="<?php echo e(route('landlord.frontend.plan.order', $plan->id)); ?>" class="btn btn-md xl:btn-lg btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill"><?php echo e($index == 2 ? __('Get in touch') : __('Start for free')); ?></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('landlord.frontend.plan.order', $plan->id)); ?>" class="btn btn-md xl:btn-lg btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill"><?php echo e(__('Start for free')); ?></a>
                                                        <?php endif; ?>
                                                        <span class="fs-7 dark:text-white opacity-70"><?php echo e(__('No credit card required!')); ?></span>
                                                    </div>
                                                    <ul class="nav-y gap-1 fs-7 xl:fs-6 dark:text-white">
                                                        <?php if($plan_features->count() > 0): ?>
                                                            <?php $__currentLoopData = $plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                    $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                ?>
                                                                <?php if($feat_status): ?>
                                                                    <li class="row child-cols items-start g-1">
                                                                        <div class="col-auto">
                                                                            <img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;">
                                                                        </div>
                                                                        <div>
                                                                            <span><?php echo e($feat_name); ?></span>
                                                                        </div>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php if($plan->page_permission_feature !== null): ?>
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span><?php echo e($plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature)); ?></span></div>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($plan->product_permission_feature !== null): ?>
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span><?php echo e($plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature)); ?></span></div>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($plan->storage_permission_feature !== null): ?>
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="<?php echo e(asset('themes/lexend-v4/assets/images/vectors/check.svg')); ?>" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span><?php echo e($plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature)); ?></span></div>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="section-footer panel vstack gap-2 items-center text-center mt-4 sm:mt-6">
                        <span class="fs-7 xl:fs-6 ft-script text-gray-500 dark:text-gray-200"><?php echo e(__('Prices are subject to change at any time and under any circumstances, and discounts are only temporary.')); ?></span>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Section end -->

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/price-plan-index13.blade.php ENDPATH**/ ?>