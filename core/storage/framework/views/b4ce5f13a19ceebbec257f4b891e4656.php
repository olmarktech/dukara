<?php
    // Pricing Plans - EXACT from page-pricing.html line 746-883
    $all_price_plan = $data['all_price_plan'] ?? [];
    $plan_types = $data['plan_types'] ?? collect();
    $monthly_text = 'Monthly';
    $yearly_text = 'Yearly';
    
    // Normalize array keys to integers for proper matching (keep Eloquent models intact)
    $normalized_price_plan = [];
    foreach ($all_price_plan as $key => $value) {
        $normalized_price_plan[(int) $key] = $value;
    }
    $all_price_plan = $normalized_price_plan;
?>

<!-- Section start -->
<div class="section panel overflow-hidden">
    <div class="section-outer panel pb-6 lg:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel">
                <ul class="uc-switcher pricing-switcher">
                    <?php if($plan_types->count() > 1 && !empty($all_price_plan)): ?>
                        <?php $__currentLoopData = $plan_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_index => $plan_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $plan_type = (int) $plan_type; // Ensure integer type
                            ?>
                            <li>
                                <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 col-match justify-center g-2 lg:g-4" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 400});">
                                    <?php if(!empty($all_price_plan[$plan_type]) && is_array($all_price_plan[$plan_type]) && count($all_price_plan[$plan_type]) > 0): ?>
                                        <?php $__currentLoopData = $all_price_plan[$plan_type]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $is_popular = !empty($plan->package_badge) || $index == 1; // Middle card or has badge
                                                // Get plan features - handle both Eloquent and array cases
                                                $plan_features = $plan->plan_features ?? collect();
                                                if (!($plan_features instanceof \Illuminate\Support\Collection)) {
                                                    $plan_features = collect($plan_features);
                                                }
                                                $first_feature_label = $index === 0 ? 'Key features:' : ($index === 1 ? 'Everything in Essentials, plus:' : 'Everything in Business, plus:');
                                            ?>
                                            <div>
                                                <div class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800 position-relative">
                                                    <?php if($is_popular && !empty($plan->package_badge)): ?>
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium"><?php echo e($plan->package_badge); ?></span>
                                                    <?php elseif($is_popular && $index == 1): ?>
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">Popular</span>
                                                    <?php endif; ?>
                                                    <div class="panel">
                                                        <h3 class="title h5 sm:h4 dark:text-white"><?php echo e($plan->title); ?></h3>
                                                        <p class="desc dark:text-white text-opacity-70 dark:opacity-80"><?php echo e($plan->package_description ?? 'For your business needs'); ?></p>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-narrow">
                                                            <?php if($plan->price > 0): ?>
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white"><?php echo e(amount_with_currency_symbol($plan->price)); ?></h5>
                                                                <span class="fs-7 opacity-70">Seat per month<?php echo e($plan_type == 0 ? ', 2 seats max' : ''); ?></span>
                                                            <?php else: ?>
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white">Let's talk</h5>
                                                                <span class="fs-7 opacity-70">Per‑seat or per‑tool pricing</span>
                                                            <?php endif; ?>
                                                            <div class="vstack gap-1 justify-center text-center mt-3">
                                                                <?php if($plan->price > 0): ?>
                                                                    <a href="<?php echo e(route('landlord.frontend.plan.order', $plan->id)); ?>" class="btn btn-md sm:btn-sm lg:btn-md btn-primary text-white">Start a free trial</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">No credit card required</span>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('landlord.dynamic.page', 'contact')); ?>" class="btn btn-md sm:btn-sm lg:btn-md btn-dark text-white dark:bg-white dark:text-dark dark:hover:bg-secondary">Contact sales</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">Respond within 24 hrs max</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-2">
                                                            <span class="fs-6 fw-bold dark:text-white"><?php echo e($first_feature_label); ?></span>
                                                            <?php if($plan_features->count() > 0): ?>
                                                                <?php $__currentLoopData = $plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                        $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                    ?>
                                                                    <?php if($feat_status): ?>
                                                                        <div class="hstack gap-1 fs-7">
                                                                            <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                            <span><?php echo e($feat_name); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                
                                                                <?php if($plan->page_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan->product_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan->blog_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->blog_permission_feature < 0 ? __('Unlimited blog posts') : sprintf(__('%d blog posts'), $plan->blog_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan->storage_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <?php if($is_popular && $index == 1): ?>
                                                        <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 m-2 d-none md:d-block">
                                                            <img class="w-100px lg:w-128px d-block dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/money.svg')); ?>" alt="money">
                                                            <img class="w-100px lg:w-128px d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/money-dark.svg')); ?>" alt="money-dark">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        
                        <?php if(!empty($all_price_plan) && is_array($all_price_plan) && count($all_price_plan) > 0): ?>
                            <?php $__currentLoopData = $all_price_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan_type => $plan_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($plan_items) && is_array($plan_items) && count($plan_items) > 0): ?>
                                <li>
                                    <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 col-match justify-center g-2 lg:g-4" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 400});">
                                        <?php $__currentLoopData = $plan_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $is_popular = !empty($plan->package_badge) || $index == 1;
                                                // Get plan features - handle both Eloquent and array cases
                                                $plan_features = $plan->plan_features ?? collect();
                                                if (!($plan_features instanceof \Illuminate\Support\Collection)) {
                                                    $plan_features = collect($plan_features);
                                                }
                                                $first_feature_label = $index === 0 ? 'Key features:' : ($index === 1 ? 'Everything in Essentials, plus:' : 'Everything in Business, plus:');
                                            ?>
                                            <div>
                                                <div class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800 position-relative">
                                                    <?php if($is_popular && !empty($plan->package_badge)): ?>
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium"><?php echo e($plan->package_badge); ?></span>
                                                    <?php elseif($is_popular && $index == 1): ?>
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">Popular</span>
                                                    <?php endif; ?>
                                                    <div class="panel">
                                                        <h3 class="title h5 sm:h4 dark:text-white"><?php echo e($plan->title); ?></h3>
                                                        <p class="desc dark:text-white text-opacity-70 dark:opacity-80"><?php echo e($plan->package_description ?? 'For your business needs'); ?></p>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-narrow">
                                                            <?php if($plan->price > 0): ?>
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white"><?php echo e(amount_with_currency_symbol($plan->price)); ?></h5>
                                                                <span class="fs-7 opacity-70">Seat per month</span>
                                                            <?php else: ?>
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white">Let's talk</h5>
                                                                <span class="fs-7 opacity-70">Per‑seat or per‑tool pricing</span>
                                                            <?php endif; ?>
                                                            <div class="vstack gap-1 justify-center text-center mt-3">
                                                                <?php if($plan->price > 0): ?>
                                                                    <a href="<?php echo e(route('landlord.frontend.plan.order', $plan->id)); ?>" class="btn btn-md sm:btn-sm lg:btn-md btn-primary text-white">Start a free trial</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">No credit card required</span>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('landlord.dynamic.page', 'contact')); ?>" class="btn btn-md sm:btn-sm lg:btn-md btn-dark text-white dark:bg-white dark:text-dark dark:hover:bg-secondary">Contact sales</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">Respond within 24 hrs max</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-2">
                                                            <span class="fs-6 fw-bold dark:text-white"><?php echo e($first_feature_label); ?></span>
                                                            <?php if($plan_features->count() > 0): ?>
                                                                <?php $__currentLoopData = $plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                        $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                    ?>
                                                                    <?php if($feat_status): ?>
                                                                        <div class="hstack gap-1 fs-7">
                                                                            <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                            <span><?php echo e($feat_name); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <?php if($plan->page_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan->product_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan->blog_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->blog_permission_feature < 0 ? __('Unlimited blog posts') : sprintf(__('%d blog posts'), $plan->blog_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan->storage_permission_feature !== null): ?>
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span><?php echo e($plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <?php if($is_popular && $index == 1): ?>
                                                        <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 m-2 d-none md:d-block">
                                                            <img class="w-100px lg:w-128px d-block dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/money.svg')); ?>" alt="money">
                                                            <img class="w-100px lg:w-128px d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/money-dark.svg')); ?>" alt="money-dark">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            
                            <li>
                                <div class="text-center py-5">
                                    <p class="text-muted"><?php echo e(__('No pricing plans available at the moment.')); ?></p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/price-plan.blade.php ENDPATH**/ ?>